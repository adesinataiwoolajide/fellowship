<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;;
use Spatie\Permission\Models\Role;
use App\{ProgramCatrgories, Programs};
use DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ProgramRepository;
use Illuminate\Support\Facades\Gate;

class ProgramController extends Controller
{
    protected $model;
    public function __construct(Programs $program)
    {
       // set the model
       $this->model = new ProgramRepository($program);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $program =Programs::orderBy('created_at', 'desc')->get();
        $category =ProgramCatrgories::orderBy('program_category_name', 'asc')->get();
        return view('administrator.programs.create')->with([
            'program' => $program,
            'category' => $category,
        ]);
    }

    public function bin()
    {
        if (auth()->user()->hasPermissionTo('Restore Program') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $program= Programs::onlyTrashed()->get();
            return view('administrator.programs.recyclebin')->with([
                'program' => $program,
            ]);
        }else{
            return redirect()->back()->with("error", "You Dont Have Access To The Recycle Bin");
        } 
    }

    public function restore($program_id)
    {
        if (auth()->user()->hasPermissionTo('Restore Program') OR 
            (Gate::allows('Administrator', auth()->user()))){
            Programs::withTrashed()
            ->where('program_id', $program_id)
            ->restore();
            $categ= Programs::where('program_id', $program_id)->first(); ;
            $name = $categ->program_name;
            $ministers = $categ->ministers;
            $program_id = $categ->program_id;
            $program_category_id = $categ->program_category_id;
            $cate = ProgramCatrgories::where('program_category_id', $program_category_id)->first();
            $program_category_name = $cate->program_category_name;
            
            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'program_name' => $name,
                    'ministers' => $ministers,
                    'program_category_name' => $program_category_name,
                   
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
        if (auth()->user()->hasPermissionTo('Add Program') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'program_name' => 'required|min:1|max:255',
                'ministers' => 'required|min:1|max:255',
                'program_category_id' => 'required|min:1|max:255',
                'program_date' => 'required|min:1|max:255',
                'start_time' => 'required|min:1|max:255',
                'end_time' => 'required|min:1|max:255',
            ]);

            $cate = ProgramCatrgories::where('program_category_id', $request->input("program_category_id"))->first();
            $program_category_name = $cate->program_category_name;

            if(Programs::where([
                "program_name"=> $request->input("program_name"),
                "program_date" => $request->input("program_date"),
                "program_category_id" => $request->input("program_category_id"),
                ])->exists()){
                return redirect()->back()->with("error",
                    "You Have added this program ". $request->input("program_name"). " Schedule to Hold on ".
                     $request->input("program_date") . " As ". $program_category_name
                 
                );
            }
            $data =new Programs ([
                "program_name" => $request->input("program_name"),
                "ministers" => $request->input("ministers"),
                "program_category_id" => $request->input("program_category_id"),
                "program_date" => $request->input("program_date"),
                "start_time" => $request->input("start_time"),
                "end_time" => $request->input("end_time"),
            ]);
            
            if($data->save()){
                
                return redirect()->route("program.create")->with("success", "You Have Added " 
                .$request->input("program_name"). " For ". $request->input("program_date").  " Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Create A Program",
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
    public function edit($program_id)
    {
        if (auth()->user()->hasPermissionTo('Edit Program') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $program =Programs::orderBy('program_name', 'desc')->get();
            $prog =  Programs::where('program_id', $program_id)->first(); 
            $category =ProgramCatrgories::orderBy('program_category_name', 'asc')->get();
            return view('administrator.programs.edit')->with([
                "program" => $program,
                "prog" =>$prog,
                "category" =>$category, 
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit A Program",
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
    public function update(Request $request, $program_id)
    {
        if (auth()->user()->hasPermissionTo("Update Program") OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'program_name' => 'required|min:1|max:255|',
                'ministers' => 'required|min:1|max:255|',
                'program_category_id' => 'required|min:1|max:255|',
                'program_date' => 'required|min:1|max:255|',
                'start_time' => 'required|min:1|max:255|',
                'end_time' => 'required|min:1|max:255|',
            ]);

            $cate = ProgramCatrgories::where('program_category_id', $request->input("program_category_id"))->first();
            $program_category_name = $cate->program_category_name;
            $program =  Programs::where('program_id', $program_id)->first(); 

            $toy = DB::table('programs')->where([
                "program_id" => $program_id
            ])->update([ 
                "program_name" => $request->input("program_name"),
                "ministers" => $request->input("ministers"),
                "program_category_id" => $request->input("program_category_id"),
                "program_date" => $request->input("program_date"),
                "start_time" => $request->input("start_time"),
                "end_time" => $request->input("end_time"),
            ]);
            
            if(!empty($toy)){
                
                return redirect()->route("program.create")->with("success", "You Have Updated " 
                .$request->input("program_name"). " For ". $request->input("program_date").  " Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Create A Program",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($program_id)
    {
        if(auth()->user()->hasPermissionTo('Delete Program') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $program =  Programs::where('program_id', $program_id)->first(); 
            $details= $program->program_name;  
            
            if ((!empty($program->delete($program_id)))AND ($program->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted $details From The  Program List Successfully",
                ]);
            }else{
                return redirect()->back()->with([
                    'error' => "Network Failure, Please try again later",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A  Program",
            ]);
        }
    }
}
