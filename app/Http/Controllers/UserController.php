<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{User};
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    protected $model;
    public function __construct(User $user)
    {
       // set the model
       $this->model = new UserRepository($user);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasPermissionTo('View User') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $user =$this->model->all();
            $user_roles = Role::orderBy('name', 'asc')->get();
            return view('administrator.users.create')->with([
                'user' => $user,
                'user_roles' => $user_roles,
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have To Check The User List",
            ]);
        }
    }

    public function bin()
    {
        if (auth()->user()->hasPermissionTo('Restore User') OR 
        (Gate::allows('Administrator', auth()->user()))){
            $user= User::onlyTrashed()->get();
            return view('administrator.users.recyclebin')->with([
                'user' => $user,
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To The Bin",
            ]);
        }
    }

    public function restore($user_id)
    {
        if (auth()->user()->hasPermissionTo('Restore User') OR 
        (Gate::allows('Administrator', auth()->user()))){
            User::withTrashed()
            ->where('user_id', $user_id)
            ->restore();
            $categ= $this->model->show($user_id);
            $name = $categ->name;
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
            return redirect()->back()->with("error", "You Dont Have Access To The Recycle Bin");
        } 
        
    }

    public function profile()
    {
        $use = User::where('email', auth()->user()->email)->first();
        activity()
            ->performedOn($use)
            ->causedBy(auth()->user()->id)
            ->withProperties([
                'name' => $use->name,
                'email' => $use->email,
            ])
        ->log('view profile');
        return view('administrator.users.my_profile')->with([
            "use" => $use,  
        ]);
    }

    public function resetpassword()
    {
        
        $use = User::where('email', auth()->user()->email)->first();
        activity()
            ->performedOn($use)
            ->causedBy(auth()->user()->id)
            ->withProperties([
                'name' => $use->name,
                'email' => $use->email,
            ])
        ->log('reset password');
        return view('administrator.users.change_password')->with([
            "use" => $use,
        ]);
    }

    public function updateprofile(Request $request, $user_id)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:255|',
            'role' => 'required|min:1|max:255'
        ]);
        $user = $this->model->show($user_id);
    
        $data =([
            "user" => $this->model->show($user_id),
            "email" => $request->input("email"),
            "name" => $request->input("name"),
            "role" => $request->input("role"),
            "status" => 1,
        ]);

        DB::table('model_has_roles')->where('model_id',$user_id)->delete();

        if(($this->model->update($data, $user_id))){
            $addRoles = $user->assignRole($request->input('role'));
            activity()
            ->performedOn($user)
            ->causedBy(auth()->user()->id)
            ->withProperties([
                'name' => $user->name,
                'email' => $user->email,
            ])
        ->log('updated profile');
            
            return redirect()->route("administrator.dashboard")->with("success", "You Have Updated Your
            Details Successfully");
        }else{
            return redirect()->back()->with("error", "Network Failure");
        } 
    }

    public function updatepassword(Request $request)
    {
        
        $validate = $this->validate($request, [
            'name' => 'required|min:1|max:255|',
            'password' => 'required|confirmed|min:1|max:255',
        ]);
        $user_id = auth()->user()->user_id;

        $data =([
            "user" => $this->model->show($user_id),
            "email" => $request->input("email"),
            "name" => $request->input("name"),
            "password" => Hash::make($request->input("password")),
            "role" => $request->input("role"),
            "status" => 1,
        ]);
        $user = User::findorFail($user_id);
        
        if(($this->model->update($data, $user_id))){
            
            return redirect()->route("administrator.dashboard")->with("success", "You Have Changed Your Password Successfully");
        }else{
            return redirect()->back()->with("error", "Network Failure");
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
        if (auth()->user()->hasPermissionTo('Add User') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'name' => 'required|min:1|max:255|',
                'email' => 'required||min:1|max:255|unique:users',
                'password' => 'required|min:1|max:255',
                'role' => 'required|min:1|max:255'
            ]);

            
            
            if(User::where("email", $request->input("email"))->exists()){
                return redirect()->back()->with("error", $request->input("email"). "is In Use By Another User");
            }
            $data =new User ([
                
                "email" => $request->input("email"),
                "name" => $request->input("name"),
                "password" => Hash::make($request->input("password")),
                "role" => $request->input("role"),
                "status" => 1,
            ]);
            
            if($data->save()){
                $addRoles = $data->assignRole($request->input('role'));
            
                return redirect()->route("user.create")->with("success", "You Have Added User " 
                .$request->input("name"). " The User List Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create A User",
            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function suspendAccount($user_id)
    {
        if (auth()->user()->hasPermissionTo('Suspend User') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $use = $this->model->show($user_id); 
            $name = $use->name;
            $email = $use->email;
            $data =([
                "user" => $this->model->show($user_id),
                "status" => 0,
            ]);
            if(($this->model->update($data, $user_id))){
                
                return redirect()->route("user.create")->with("success", "You Have Suspended". $name . "  Account Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        }else{
            return redirect()->back()->with("error", "You Dont Have Access To Suspend a User Account");
        } 
    }

    public function unSuspendAccount($user_id)
    {
        if (auth()->user()->hasPermissionTo('Un Suspend User') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $use = $this->model->show($user_id); 
            $name = $use->name;
            $email = $use->email;
            $data =([
                "user" => $this->model->show($user_id),
                "status" => 1,
            ]);
            if(($this->model->update($data, $user_id))){
                
                return redirect()->route("user.create")->with("success", "You Have Un Suspended". $name . "  Account Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        }else{
            return redirect()->back()->with("error", "You Dont Have Access To Un Suspend a User Account");
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        if (auth()->user()->hasPermissionTo('Edit User') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $user = $this->model->all();
            $use = $this->model->show($user_id); 
            $roles = Role::pluck('name','name')->all();
            $userRole = $use->roles->pluck('name','name')->all();
            $user_roles = Role::all();
            
            return view('administrator.users.edit')->with([
                "user" => $user,
                "use" =>$use,
                "userRole" => $userRole,
                "roles"=>$roles,
                'user_roles' => $user_roles
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit A User",
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
    public function update(Request $request, $user_id)
    {
        if (auth()->user()->hasPermissionTo('Update User') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'name' => 'required|min:1|max:255|',
                'email' => 'required||min:1|max:255',
                'password' => 'max:255',
                'role' => 'required|min:1|max:255'
            ]);
            $user = $this->model->show($user_id);
            
            if(empty($request->input("password"))){
                $password = $user->password;
            }else{
                $password = Hash::make($request->input("password"));
            }
            $data =([
                "user" => $this->model->show($user_id),
                "email" => $request->input("email"),
                "name" => $request->input("name"),
                "password" => $password,
                "role" => $request->input("role"),
                "status" => 1,
            ]);

        
            DB::table('model_has_roles')->where('model_id',$user_id)->delete();

            if(($this->model->update($data, $user_id))){
                $addRoles = $user->assignRole($request->input('role'));
                
                return redirect()->route("user.create")->with("success", "You Have Updated The User 
                Details Successfully");
            }else{
                return redirect()->back()->with("error", "Network Failure");
            } 
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Update A User",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        if (auth()->user()->hasPermissionTo('Delete User') OR 
        (Gate::allows('Administrator', auth()->user()))){
            $user =  $this->model->show($user_id);  
            $use = User::where([
                "user_id" => $user_id, 
            ])->first();
            
            $details= $use->name; 
            $email = $use->email;
            $roles = $use->role;
            
            if (($user->delete($user_id)) AND ($user->trashed())) {
                $use->removeRole($roles);
                return redirect()->back()->with([
                    'success' => "You Have Deleted  $details From The User Details Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A User",
            ]);
        }
    }
}
