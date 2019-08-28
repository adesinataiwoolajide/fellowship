<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;;
use Spatie\Permission\Models\Role;
use App\{ProgramCatrgories};
use DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ProgramCategoryRepository;
use Illuminate\Support\Facades\Gate;
class ProgramCatagoryController extends Controller
{
    protected $model;
    public function __construct(ProgramCatrgories $category)
    {
       // set the model
       $this->model = new ProgramCategoryRepository($category);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $category =ProgramCatrgories::orderBy('program_category_name', 'asc')->get();
        return view('administrator.program_categories.create')->with([
            'category' => $category,
        ]);
    }

    public function bin()
    {
        if (auth()->user()->hasPermissionTo('Restore Program Category') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $category= ProgramCatrgories::onlyTrashed()->get();
            return view('administrator.program_categories.recyclebin')->with([
                'category' => $category,
            ]);
        }else{
            return redirect()->back()->with("error", "You Dont Have Access To The Recycle Bin");
        } 
    }

    public function restore($program_category_id)
    {
        if (auth()->user()->hasPermissionTo('Restore Program Category') OR 
            (Gate::allows('Administrator', auth()->user()))){
            ProgramCatrgories::withTrashed()
            ->where('program_category_id', $program_category_id)
            ->restore();
            $categ= $this->model->show($program_category_id);
            $name = $categ->program_category_name;
            
            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'program_category_name' => $name,
                   
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
        if (auth()->user()->hasPermissionTo('Add Program Category') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'program_category_name' => 'required|min:1|max:255|unique:program_categories',
            ]);

            if(ProgramCatrgories::where("program_category_name", $request->input("program_category_name"))->exists()){
                return redirect()->back()->with("error", $request->input("program_category_name").
                 "Already Exist on the list of program categories");
            }
            $data =new ProgramCatrgories ([
                "program_category_name" => $request->input("program_category_name"),
            ]);
            
            if($data->save()){
                
                return redirect()->route("program.category.create")->with("success", "You Have Added " 
                .$request->input("program_category_name"). " Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Create A Program Category",
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
    public function edit($program_category_id)
    {
        if (auth()->user()->hasPermissionTo('Edit Program Category') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $category =ProgramCatrgories::orderBy('program_category_name', 'asc')->get();
            $cate = $this->model->show($program_category_id); 
            return view('administrator.program_categories.edit')->with([
                "category" => $category,
                "cate" =>$cate,
               
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit A Program Category",
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
    public function update(Request $request, $program_category_id)
    {
        if (auth()->user()->hasPermissionTo('Update Program Category') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'program_category_name' => 'required|min:1|max:255',
            ]);

            $category = $this->model->show($program_category_id);
            $data =([
                $category = $this->model->show($program_category_id),
                "program_category_name" => $request->input("program_category_name"),
            ]);
            
            if(($this->model->update($data, $program_category_id))){
                
                return redirect()->route("program.category.create")->with("success", "You Have Updated " 
                .$request->input("program_category_name"). " Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Update A  Program Category",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($program_category_id)
    {
        if(auth()->user()->hasPermissionTo('Delete Program Category') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $category =  $this->model->show($program_category_id); 
            $details= $category->program_category_name;  
            
            if (($category->delete($program_category_id))AND ($category->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted $details From The  Program Category List Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A  Program Category",
            ]);
        }
    }
}
