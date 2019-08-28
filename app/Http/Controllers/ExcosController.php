<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{Position, Unit, SchoolSession, Excos};
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Repositories\ExcosRepository;
use Illuminate\Support\Facades\Gate;
class ExcosController extends Controller
{
    protected $model;
    public function __construct(Excos $excos)
    {
       // set the model
       $this->model = new ExcosRepository($excos);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $excos =$this->model->all();
        $position = Position::orderBy('position_name', 'asc')->get();
        $session = SchoolSession::orderBy('session_name', 'asc')->get();
        $unit = Unit::orderBy('unit_name', 'asc')->get();
        return view("administrator.executives.index")->with([
            'excos' => $excos,
            'position' => $position,
            'session' => $session,
            'unit' => $unit,
        ]);
    }

    public function bin()
    {
        $excos= Excos::onlyTrashed()->get();
        return view('administrator.executives.recyclebin')->with([
            'excos' => $excos,
        ]);
    }

    public function restore($exco_id)
    {
        if (Gate::allows('Administrator', auth()->user())) {
            Excos::withTrashed()
            ->where('exco_id', $exco_id)
            ->restore();
            $categ= $this->model->show($exco_id);
            $name = $categ->surname;
            $email = $categ->email;
        
            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'name' => $name,
                    'email' => $email,
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
        $excos =Excos::orderBy('session_id', 'asc')->get();
        $position = Position::orderBy('position_name', 'asc')->get();
        $session = SchoolSession::orderBy('session_name', 'asc')->get();
        $unit = Unit::orderBy('unit_name', 'asc')->get();
        return view("administrator.executives.create")->with([
            'excos' => $excos,
            'position' => $position,
            'session' => $session,
            'unit' => $unit,
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
        if (auth()->user()->hasPermissionTo('Add Excos') OR 
        (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'surname' => 'required|min:1|max:255|',
                'other_names' => 'required|min:1|max:255|',
                'email' => 'required||min:1|max:255|',
                'phone_number' => 'required|min:1|max:11|',
                'dept' => 'required|min:1|max:255|',
                'faculty' => 'required|min:1|max:255|',
                'unit_id' => 'required|min:1|max:255|',
                'position_id' => 'required|min:1|max:255|',
                'session_id' => 'required|min:1|max:255|',
                'category' => 'required|min:1|max:255|',
                'dob' => 'required|min:1|max:255|',
                
            ]);

            $session_id = $request->input("session_id");
            $position_id = $request->input("position_id");
            $unit_id = $request->input("unit_id");
            $getPosition = Position::where("position_id", $position_id)->first();
            $position_name = $getPosition->position_name;

            $getUnit = Unit::where("unit_id", $unit_id)->first();
            $unit_name = $getUnit->unit_name;

            $getSession = SchoolSession::where("session_id", $session_id)->first();
            $session_name = $getSession->session_name;
            
            if(Excos::where("email", $request->input("email"))->exists()){
                return redirect()->back()->with("error", $request->input("email"). "is In Use By Another Excos");
            }elseif(Excos::where([
                "email"=> $request->input("email"),
                "session_id" => $request->input("session_id"),
                "position_id" => $request->input("position_id")
                
            ])->exists()){
                return redirect()->back()->with("error", 
                $request->input("email"). "You Have Added ". $request->input("surname")." As The " .
                $position_name, " For ". $session_name. "  Academic Session before");

            }elseif(Excos::where([
                "session_id" => $request->input("session_id"),
                "position_id" => $request->input("position_id") ])->exists()){
                return redirect()->back()->with("error", 
                $request->input("email"). "You Have Added An Exco As The " .
                $position_name, " For ". $session_name. "  Academic Session before");

            }else{
                if($request->hasFile('passport')){
                    //Getting File Name With Extension
                    $filenameWithExt = $request->file('passport')->getClientOriginalName();
                    // Get Just File Name
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('passport')->getClientOriginalExtension();
                    // file name to store
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;
                    //upload the image
                    $path=$request->file('passport')->move('excos-passport', $fileNameToStore);
                }else{
                    $fileNameToStore = 'no-image.png';
                }
                $data =new Excos ([
                    
                    "email" => $request->input("email"),
                    "surname" => $request->input("surname"),
                    "other_names" => $request->input("other_names"),
                    "dept" => $request->input("dept"),
                    "faculty" => $request->input("faculty"),
                    "unit_id" => $request->input("unit_id"),
                    "position_id" => $request->input("position_id"),
                    "session_id" => $request->input("session_id"),
                    "status" => 1,
                    "category" => $request->input("category"),
                    "dob" => $request->input("dob"),
                    "passport" => $fileNameToStore,
                    "phone_number" => $request->input("phone_number"),
                ]);
                
                if($data->save()){
                    
                    return redirect()->route("excos.create")->with("success", "You Have Added " 
                    .$request->input("name"). " To The Excos List Successfully");
                }else{
                    return redirect()->back()->with("error", "Network Failure");
                } 
            }
            
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create An Excos",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        if (auth()->user()->hasPermissionTo('View Excos') OR 
        (Gate::allows('Administrator', auth()->user()))){
            $excos = Excos::where('email', $email)->first();
            $exco_id = $excos->exco_id;

            return view("administrator.executives.profile")->with([
                'excos' => $excos,
                
            ]);


        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View An Exco Details",
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($email)
    {
        if (auth()->user()->hasPermissionTo('Edit Excos') OR 
        (Gate::allows('Administrator', auth()->user()))){
            $exco = Excos::where('email', $email)->first();
            $exco_id = $exco->exco_id;
            // $excos =Excos::orderBy('session_id', 'asc')->get();
            $position = Position::orderBy('position_name', 'asc')->get();
            $session = SchoolSession::orderBy('session_name', 'asc')->get();
            $unit = Unit::orderBy('unit_name', 'asc')->get();

            return view("administrator.executives.edit")->with([
                'exco' => $exco,
                'position' => $position,
                'session' => $session,
                'unit' => $unit,  
            ]);


        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View An Exco Details",
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
    public function update(Request $request, $email)
    {
        if (auth()->user()->hasPermissionTo('Update Excos') OR 
        (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'surname' => 'required|min:1|max:255|',
                'other_names' => 'required|min:1|max:255|',
                'email' => 'required||min:1|max:255|',
                'phone_number' => 'required|min:1|max:11|',
                'dept' => 'required|min:1|max:255|',
                'faculty' => 'required|min:1|max:255|',
                'unit_id' => 'required|min:1|max:255|',
                'position_id' => 'required|min:1|max:255|',
                'session_id' => 'required|min:1|max:255|',
                'category' => 'required|min:1|max:255|',
                'dob' => 'required|min:1|max:255|',
                
            ]);

            $excoss = Excos::where('email', $email)->first();
            $exco_id = $excoss->exco_id;

            $session_id = $request->input("session_id");
            $position_id = $request->input("position_id");
            $unit_id = $request->input("unit_id");
            $getPosition = Position::where("position_id", $position_id)->first();
            $position_name = $getPosition->position_name;

            $getUnit = Unit::where("unit_id", $unit_id)->first();
            $unit_name = $getUnit->unit_name;

            $getSession = SchoolSession::where("session_id", $session_id)->first();
            $session_name = $getSession->session_name;
            
            
            if($request->hasFile('passport')){
                //Getting File Name With Extension
                $filenameWithExt = $request->file('passport')->getClientOriginalName();
                // Get Just File Name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('passport')->getClientOriginalExtension();
                // file name to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //upload the image
                $path=$request->file('passport')->move('excos-passport', $fileNameToStore);
            }
            if(empty($request->hasFile('passport'))){
                $fileNameToStore = $excoss->passport;
            }
            $data =([
                "excos" => $this->model->show($exco_id),
                "email" => $request->input("email"),
                "surname" => $request->input("surname"),
                "other_names" => $request->input("other_names"),
                "dept" => $request->input("dept"),
                "faculty" => $request->input("faculty"),
                "unit_id" => $request->input("unit_id"),
                "position_id" => $request->input("position_id"),
                "session_id" => $request->input("session_id"),
                "status" => 1,
                "category" => $request->input("category"),
                "dob" => $request->input("dob"),
                "passport" => $fileNameToStore,
                "phone_number" => $request->input("phone_number"),
            ]);
            
            if(($this->model->update($data, $exco_id))){
                
                return redirect()->route("excos.index")->with("success", "You Have Updated " 
                .$request->input("name"). " Details Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
            
            
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create An Excos",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($exco_id)
    {
        if (Gate::allows('Administrator', auth()->user())) {
            $excos =  $this->model->show($exco_id);  
            $use = Excos::where([
                "exco_id" => $exco_id, 
            ])->first();
            
            $details= $use->name; 
            $email = $use->email;
           
            
            if (($excos->delete($exco_id)) AND ($excos->trashed())) {
               
                return redirect()->back()->with([
                    'success' => "You Have Deleted  $details From The Excos List Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete An Exco",
            ]);
        }
    }
}
