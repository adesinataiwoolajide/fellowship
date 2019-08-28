<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\{User, Position, SchoolSession, Unit, Excos};
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Gate;
class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userlogin(Request $request)
    {
        $data = [
            "email" => $request->input("email"),
            "password" => $request->input("password"),
        ];
        // $user = User::where('user_id', 1)->first();
        // $user->assignRole('Administrator');
        if(Auth::attempt($data)){
            $status =  Auth::user()->status;
            if($status ==1){
                $usertype = Auth::user()->role;
                switch ($usertype){
                    case (auth()->user()->hasRole('Administrator') OR 
                        (auth()->user()->hasRole('President')));
                        if(auth()->user()->hasRole('Administrator')){
                            $message = "Administrator";
                        }else{
                            $message = "President";
                            auth()->user()->givePermissionTo([
                                'Add User', 'Edit User', 'Update User', 'Delete User'
                            ]);
                        }
                    
                    break;
                    
                    case (auth()->user()->hasRole('Vice President'));
                        $message = "Vice President";
                        auth()->user()->givePermissionTo([
                            'Add User', 'Edit User', 'Update User', 'Delete User'
                        ]);
                    break;
                    
                    default:
                    $message = "";
                }
                
                if(!empty($usertype)){
                
                    return redirect()->route("administrator.dashboard")->with([
                        "success" => Auth::user()->name. " ". "Welcome To $message  Dashboard"
                    ]);
                }else{
                
                    return redirect()->back()->with([
                        "error" => "Ooops!!! Invalid User Name or Password",
                    ]);
                }
            }else{
                return redirect()->back()->with([
                    "error" => "Ooops!!! Your Account is Suspended, Please Contact The Admin",
                ]);
            }
            
        }else{
            
            return redirect()->back()->with([
                "error" => "Ooops!! Your Account Does Not Exist",
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return view("auth.login");
    }
    public function login()
    {
        return view("auth.login");
        //
    }

    public function dashboard()
    {
        $user = User::orderBy('name', 'asc')->get();
        $position = Position::orderBy('position_name', 'asc')->get();
        $session = SchoolSession::orderBy('session_name', 'asc')->get();
        $unit = Unit::orderBy('unit_name', 'asc')->get();
        $excos = Excos::orderBy('surname', 'asc')->get();
        return view("administrator.dashboard")->with([
            'user' => $user,
            'position' => $position,
            'session' => $session,
            'unit' => $unit,
            'excos' => $excos,
        ]);
        
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
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
