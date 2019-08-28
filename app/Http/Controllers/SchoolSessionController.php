<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;;
use Spatie\Permission\Models\Role;
use App\{SchoolSession};
use DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\SessionRepository;
use Illuminate\Support\Facades\Gate;

class SchoolSessionController extends Controller
{
    protected $model;
    public function __construct(SchoolSession $session)
    {
       // set the model
       $this->model = new SessionRepository($session);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session =SchoolSession::orderBy('session_name', 'asc')->get();
        return view('administrator.academic_session.create')->with([
            'session' => $session,
        ]);
    }

    public function bin()
    {
        if (auth()->user()->hasPermissionTo('Restore Session') OR 
        (Gate::allows('Administrator', auth()->user()))){
            $session= SchoolSession::onlyTrashed()->get();
            return view('administrator.academic_session.recyclebin')->with([
                'session' => $session,
            ]);
        }else{
            return redirect()->back()->with("error", "You Dont Have Access To The Bin");
        } 
    }

    public function restore($session_id)
    {
        if (auth()->user()->hasPermissionTo('Restore Session') OR 
            (Gate::allows('Administrator', auth()->user()))){
                SchoolSession::withTrashed()
            ->where('session_id', $session_id)
            ->restore();
            $categ= $this->model->show($session_id);
            $name = $categ->session_name;
            
            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'session_name' => $name,
                   
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasPermissionTo('Add Session') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'session_name' => 'required|min:1|max:255|unique:school_sessions',
            ]);

            if(SchoolSession::where("session_name", $request->input("session_name"))->exists()){
                return redirect()->back()->with("error", $request->input("session_name"). "Already Exist on the list of Academic Sessions");
            }
            $data =new SchoolSession ([
                "session_name" => $request->input("session_name"),
            ]);
            
            if($data->save()){
                
                return redirect()->route("session.create")->with("success", "You Have Added " 
                .$request->input("session_name"). " To The Academic Session List Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Create Academic Session",
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
    public function edit($session_id)
    {
        if (auth()->user()->hasPermissionTo('Edit Session') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $session =SchoolSession::orderBy('session_name', 'asc')->get();
            $sess = $this->model->show($session_id); 
            return view('administrator.academic_session.edit')->with([
                "session" => $session,
                "sess" =>$sess,
               
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit A Session",
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
    public function update(Request $request, $session_id)
    {
        if (auth()->user()->hasPermissionTo('Update Session') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'session_name' => 'required|min:1|max:255',
            ]);

            $session = $this->model->show($session_id);
            $data =([
                $session = $this->model->show($session_id),
                "session_name" => $request->input("session_name"),
            ]);
            
            if(($this->model->update($data, $session_id))){
                
                return redirect()->route("session.create")->with("success", "You Have Updated " 
                .$request->input("session_name"). " Academic Session Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Update Academic Session",
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($session_id)
    {
        if(auth()->user()->hasPermissionTo('Delete Session') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $session =  $this->model->show($session_id); 
            $details= $session->session_name;  
            
            if (($session->delete($session_id))AND ($session->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted $details From The Academic Session List Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A Session",
            ]);
        }
    }
}
