<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;;
use Spatie\Permission\Models\Role;
use App\{Position};
use DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PositionRepository;
use Illuminate\Support\Facades\Gate;
class PositionController extends Controller
{
    protected $model;
    public function __construct(Position $position)
    {
       // set the model
       $this->model = new PositionRepository($position);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $position =position::orderBy('position_name', 'asc')->get();
        return view('administrator.positions.create')->with([
            'position' => $position,
        ]);
    }

    public function bin()
    {
        $position= Position::onlyTrashed()->get();
        return view('administrator.positions.recyclebin')->with([
            'position' => $position,
        ]);
    }

    public function restore($position_id)
    {
        if (auth()->user()->hasPermissionTo('Restore Position') OR 
            (Gate::allows('Administrator', auth()->user()))){
            position::withTrashed()
            ->where('position_id', $position_id)
            ->restore();
            $categ= $this->model->show($position_id);
            $name = $categ->position_name;
            
            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'position_name' => $name,
                   
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
        if (auth()->user()->hasPermissionTo('Add Position') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'position_name' => 'required|min:1|max:255|unique:positions',
            ]);

            if(Position::where("position_name", $request->input("position_name"))->exists()){
                return redirect()->back()->with("error", $request->input("position_name"). "Already Exist on the list of Positions");
            }
            $data =new Position ([
                "position_name" => $request->input("position_name"),
            ]);
            
            if($data->save()){
                
                return redirect()->route("position.create")->with("success", "You Have Added " 
                .$request->input("position_name"). " To The Position List Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Create A position",
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
    public function edit($position_id)
    {
        if (auth()->user()->hasPermissionTo('Edit Position') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $position =Position::orderBy('position_name', 'asc')->get();
            $posi = $this->model->show($position_id); 
            return view('administrator.positions.edit')->with([
                "position" => $position,
                "posi" =>$posi,
               
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit A Position",
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
    public function update(Request $request, $position_id)
    {
        if (auth()->user()->hasPermissionTo('Update Position') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'position_name' => 'required|min:1|max:255',
            ]);

            $position = $this->model->show($position_id);
            $data =([
                $position = $this->model->show($position_id),
                "position_name" => $request->input("position_name"),
            ]);
            
            if(($this->model->update($data, $position_id))){
                
                return redirect()->route("position.create")->with("success", "You Have Updated " 
                .$request->input("position_name"). " Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Update A Position",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($position_id)
    {
        if(auth()->user()->hasPermissionTo('Delete Position') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $position =  $this->model->show($position_id); 
            $details= $position->position_name;  
            
            if (($position->delete($position_id))AND ($position->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted $details From The Position List Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A Position",
            ]);
        }
    }
}
