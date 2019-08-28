<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;;
use Spatie\Permission\Models\Role;
use App\{ProgramCatrgories, Messages};
use DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\MessageRepository;
use Illuminate\Support\Facades\Gate;
class MessageController extends Controller
{
    protected $model;
    public function __construct(Messages $message)
    {
       // set the model
       $this->model = new MessageRepository($message);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message =Messages::orderBy('created_at', 'desc')->get();
        return view('administrator.messages.index')->with([
            'message' => $message,
        ]);
    }

    public function bin()
    {
        if (auth()->user()->hasPermissionTo('Restore Message') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $message= Messages::onlyTrashed()->get();
            return view('administrator.messages.recyclebin')->with([
                'message' => $message,
            ]);
        }else{
            return redirect()->back()->with("error", "You Dont Have Access To The Recycle Bin");
        } 
    }

    public function restore($message_id)
    {
        if (auth()->user()->hasPermissionTo('Restore Message') OR 
            (Gate::allows('Administrator', auth()->user()))){
            Messages::withTrashed()
            ->where('message_id', $message_id)
            ->restore();
            $categ= Messages::where('message_id', $message_id)->first(); ;
            $name = $categ->title;
            $preacher = $categ->preacher;
            $message_id = $categ->message_id;
            $program_category_id = $categ->program_category_id;
            $cate = ProgramCatrgories::where('program_category_id', $program_category_id)->first();
            $program_category_name = $cate->program_category_name;
            
            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'title' => $name,
                    'preacher' => $preacher,
                    'program_category_id' => $program_category_name,
                   
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
        $message =Messages::orderBy('created_at', 'desc')->get();
        $category =ProgramCatrgories::orderBy('program_category_name', 'asc')->get();
        return view('administrator.messages.create')->with([
            'message' => $message,
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasPermissionTo('Add Message') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'title' => 'required|min:1|max:255',
                'preacher' => 'required|min:1|max:255',
                'program_category_id' => 'required|min:1|max:255',
                'bible_verses' => 'required|min:1|max:255',
                'content' => 'required|min:1|max:255',
                'message_link' => 'max:255',
            ]);

            $cate = ProgramCatrgories::where('program_category_id', $request->input("program_category_id"))->first();
            $program_category_name = $cate->program_category_name;

            if(empty($request->input('message_link'))){
                $message_link = "no link";
            }else{
                $message_link = $request->input('message_link');
            }
            $data =new Messages ([
                "title" => $request->input("title"),
                "preacher" => $request->input("preacher"),
                "program_category_id" => $request->input("program_category_id"),
                "bible_verses" => $request->input("bible_verses"),
                "content" => $request->input("content"),
                "message_link" => $message_link,
            ]);
            
            if($data->save()){
                
                return redirect()->route("message.index")->with("success", "You Have Added The Message Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Create A Message",
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
    public function edit($message_id)
    {
        if (auth()->user()->hasPermissionTo('Edit Message') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $message =Messages::orderBy('created_at', 'desc')->get();
            $mess = $this->model->show($message_id); 
            $category =ProgramCatrgories::orderBy('program_category_name', 'asc')->get();
            return view('administrator.messages.edit')->with([
                "message" => $message,
                "mess" =>$mess,
                "category" => $category,
               
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit A Message",
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
    public function update(Request $request, $message_id)
    {
        if (auth()->user()->hasPermissionTo('Add Message') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'title' => 'required|min:1|max:255',
                'preacher' => 'required|min:1|max:255',
                'program_category_id' => 'required|min:1|max:255',
                'bible_verses' => 'required|min:1|max:500',
                'content' => 'required|min:1|max:10000',
            ]);

            $cate = ProgramCatrgories::where('program_category_id', $request->input("program_category_id"))->first();
            $program_category_name = $cate->program_category_name;

            if(empty($request->input('message_link'))){
                $message_link = "no link";
            }else{
                $message_link = $request->input('message_link');
            }
            $data = ([
                "message" => $this->model->show($message_id),
                "title" => $request->input("title"),
                "preacher" => $request->input("preacher"),
                "program_category_id" => $request->input("program_category_id"),
                "bible_verses" => $request->input("bible_verses"),
                "content" => $request->input("content"),
                "message_link" => $message_link,
            ]);
            
            if(($this->model->update($data, $message_id))){
                
                return redirect()->route("message.index")->with("success", "You Have Updated The Message Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                "error" => "You Dont have Access To Update A Message",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($message_id)
    {
        if(auth()->user()->hasPermissionTo('Delete Message') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $message =  $this->model->show($message_id); 
            $details= $message->title;  
            
            if (($message->delete($message_id))AND ($message->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted $details From The message List Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A message",
            ]);
        }
    }
}
