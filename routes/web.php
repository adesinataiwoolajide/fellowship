<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('website.index');
});
Route::post("/user_login", "AdministratorController@userlogin")->name("admin.login");
Route::get("/login", "AdministratorController@userlogin")->name("login");
Route::get("/logout", "AdministratorController@logout")->name("admin.logout");
Route::get("/administrator", "AdministratorController@index")->name("admin.index");


// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Auth::routes(['verify' => true]);
Route::get("/administrator/dashboard", "AdministratorController@dashboard")->name("administrator.dashboard");
Route::group(["prefix" => "administrator", "middleware" => "verified"], function(){

    Route::group(["prefix" => "users"], function(){
        Route::get("/index", "UserController@index")->name("user.create");
        Route::post("/save", "UserController@store")->name("user.save");
        Route::get("/edit/{user_id}", "UserController@edit")->name("user.edit");   
        Route::get("/delete/{user_id}", "UserController@destroy")->name("user.delete");
        Route::post("/update/{user_id}", "UserController@update")->name("user.update"); 
        Route::get("/recyclebin", "UserController@bin")->name("user.restore"); 
        Route::get("/restore/{user_id}", "UserController@restore")->name("user.undelete");
        Route::get("/change_password", "UserController@resetpassword")->name("change.pasword");
        Route::post("/update_password/{user_id}", "UserController@updatepassword")->name("update.password");
        Route::get("/profile", "UserController@profile")->name("user.profile");  
        Route::post("/update_profile/{user_id}", "UserController@updateprofile")->name("profile.update"); 

        Route::get("/suspend/{user_id}", "UserController@suspendAccount")->name("user.suspend");
        Route::get("/unsuspend/{user_id}", "UserController@unSuspendAccount")->name("user.unsuspend");
    });

    Route::group(["prefix" => "units"], function(){
        Route::get("/index", "UnitController@index")->name("unit.create");
        Route::post("/save", "UnitController@store")->name("unit.save");
        Route::get("/edit/{unit_id}", "UnitController@edit")->name("unit.edit");
        Route::get("/delete/{unit_id}", "UnitController@destroy")->name("unit.delete");
        Route::post("/update/{unit_id}", "UnitController@update")->name("unit.update");
        Route::get("/recyclebin", "UnitController@bin")->name("unit.restore"); 
        Route::get("/restore/{unit_id}", "UnitController@restore")->name("unit.undelete");
    });

    Route::group(["prefix" => "postions"], function(){
        Route::get("/index", "PositionController@index")->name("position.create");
        Route::post("/save", "PositionController@store")->name("position.save");
        Route::get("/edit/{unit_id}", "PositionController@edit")->name("position.edit");
        Route::get("/delete/{unit_id}", "PositionController@destroy")->name("position.delete");
        Route::post("/update/{unit_id}", "PositionController@update")->name("position.update");
        Route::get("/recyclebin", "PositionController@bin")->name("position.restore"); 
        Route::get("/restore/{unit_id}", "PositionController@restore")->name("position.undelete");
    });

    Route::group(["prefix" => "academic_session"], function(){
        Route::get("/index", "SchoolSessionController@index")->name("session.create");
        Route::post("/save", "SchoolSessionController@store")->name("session.save");
        Route::get("/edit/{unit_id}", "SchoolSessionController@edit")->name("session.edit");
        Route::get("/delete/{unit_id}", "SchoolSessionController@destroy")->name("session.delete");
        Route::post("/update/{unit_id}", "SchoolSessionController@update")->name("session.update");
        Route::get("/recyclebin", "SchoolSessionController@bin")->name("session.restore"); 
        Route::get("/restore/{unit_id}", "SchoolSessionController@restore")->name("session.undelete");

    });
    Route::group(["prefix" => "executives"], function(){
        Route::get("/index", "ExcosController@index")->name("excos.index");
        Route::get("/create", "ExcosController@create")->name("excos.create");
        Route::post("/save", "ExcosController@store")->name("excos.save");
        Route::get("/edit/{email}", "ExcosController@edit")->name("excos.edit");
        Route::get("/delete/{exco_id}", "ExcosController@destroy")->name("excos.delete");
        Route::post("/update/{email}", "ExcosController@update")->name("excos.update");
        Route::get("/recyclebin", "ExcosController@bin")->name("excos.restore"); 
        Route::get("/restore/{exco_id}", "ExcosController@restore")->name("excos.undelete");
        Route::get("/details/{email}", "ExcosController@show")->name("excos.details");

    });

    Route::group(["prefix" => "program_categories"], function(){
        Route::get("/create", "ProgramCatagoryController@index")->name("program.category.create");
        Route::post("/save", "ProgramCatagoryController@store")->name("program.category.save");
        Route::get("/edit/{program_category_id}", "ProgramCatagoryController@edit")->name("program.category.edit");
        Route::get("/delete/{program_category_id}", "ProgramCatagoryController@destroy")->name("program.category.delete");
        Route::post("/update/{program_category_id}", "ProgramCatagoryController@update")->name("program.category.update");
        Route::get("/recyclebin", "ProgramCatagoryController@bin")->name("program.category.restore"); 
        Route::get("/restore/{program_category_id}", "ProgramCatagoryController@restore")->name("program.category.undelete");
    });

    Route::group(["prefix" => "programs"], function(){
        Route::get("/create", "ProgramController@index")->name("program.create");
        Route::post("/save", "ProgramController@store")->name("program.save");
        Route::get("/edit/{program_id}", "ProgramController@edit")->name("program.edit");
        Route::get("/delete/{program_id}", "ProgramController@destroy")->name("program.delete");
        Route::post("/update/{program_id}", "ProgramController@update")->name("program.update");
        Route::get("/recyclebin", "ProgramController@bin")->name("program.restore"); 
        Route::get("/restore/{program_id}", "ProgramController@restore")->name("program.undelete");
    });

    Route::group(["prefix" => "messages"], function(){
        Route::get("/index", "MessageController@index")->name("message.index");
        Route::get("/create", "MessageController@create")->name("message.create");
        Route::post("/save", "MessageController@store")->name("message.save");
        Route::get("/edit/{program_id}", "MessageController@edit")->name("message.edit");
        Route::get("/delete/{program_id}", "MessageController@destroy")->name("message.delete");
        Route::post("/update/{program_id}", "MessageController@update")->name("message.update");
        Route::get("/recyclebin", "MessageController@bin")->name("message.restore"); 
        Route::get("/restore/{program_id}", "MessageController@restore")->name("message.undelete");
    });

});

