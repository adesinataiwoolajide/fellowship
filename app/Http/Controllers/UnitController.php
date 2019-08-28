<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;;
use Spatie\Permission\Models\Role;
use App\{Unit};
use DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UnitRepository;
use Illuminate\Support\Facades\Gate;
class UnitController extends Controller
{
    protected $model;
    public function __construct(Unit $unit)
    {
       // set the model
       $this->model = new UnitRepository($unit);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $unit =Unit::orderBy('unit_name', 'asc')->get();
        return view('administrator.units.create')->with([
            'unit' => $unit,
        ]);
    }

    public function bin()
    {
        if (auth()->user()->hasPermissionTo('Restore Unit') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $unit= Unit::onlyTrashed()->get();
            return view('administrator.units.recyclebin')->with([
                'unit' => $unit,
            ]);
        }else{
            return redirect()->back()->with("error", "You Dont Have Access To The Bin");
        }
    }

    public function restore($unit_id)
    {
        if (auth()->user()->hasPermissionTo('Restore Unit') OR 
            (Gate::allows('Administrator', auth()->user()))){
            Unit::withTrashed()
            ->where('unit_id', $unit_id)
            ->restore();
            $categ= $this->model->show($unit_id);
            $name = $categ->unit_name;
            
            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'unit_name' => $name,
                   
                ])
            ->log('restored');
            return redirect()->back()->with([
                'success' => " You Have Restored". " ".$name. " " ." Details Successfully",
                
            ]);
        
        }else{
            return redirect()->back()->with("error", "You Dont Have Access To Restore From The Bin");
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasPermissionTo('Add Unit') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'unit_name' => 'required|min:1|max:255|unique:units',
            ]);

            if(Unit::where("unit_name", $request->input("unit_name"))->exists()){
                return redirect()->back()->with("error", $request->input("unit_name"). "Already Exist on the list of Unit");
            }
            $data =new Unit ([
                "unit_name" => $request->input("unit_name"),
            ]);
            
            if($data->save()){
                
                return redirect()->route("unit.create")->with("success", "You Have Added " 
                .$request->input("unit_name"). " The Unit List Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Create A Unit",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($unit_id)
    {
        if (auth()->user()->hasPermissionTo('Edit Unit') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $unit =Unit::orderBy('unit_name', 'asc')->get();
            $uni = $this->model->show($unit_id); 
            return view('administrator.units.edit')->with([
                "unit" => $unit,
                "uni" =>$uni,
               
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit A Unit",
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $unit_id)
    {
        if (auth()->user()->hasPermissionTo('Update Unit') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'unit_name' => 'required|min:1|max:255',
            ]);

            $unit = $this->model->show($unit_id);
            $data =([
                $unit = $this->model->show($unit_id),
                "unit_name" => $request->input("unit_name"),
            ]);
            
            if(($this->model->update($data, $unit_id))){
                
                return redirect()->route("unit.create")->with("success", "You Have Updated " 
                .$request->input("unit_name"). " Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Update A Unit",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($unit_id)
    {
        if(auth()->user()->hasPermissionTo('Delete Unit') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $unit =  $this->model->show($unit_id); 
            $details= $unit->unit_name;  
            
            if (($unit->delete($unit_id))AND ($unit->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted $details From The Unit List Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A Unit",
            ]);
        }
    }
}
