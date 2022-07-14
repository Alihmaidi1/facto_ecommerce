<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\admin\account\update_profile as update_profilerequest ;
use App\Models\User;
use App\repo\interfaces\User as userinterface;
class account extends Controller
{

    public $user;
    public function __construct(userInterface $user)
    {
        $this->user=$user;
    }



    public function login(Request $request){


        if(Auth::guard("web")->attempt(["email"=>$request->email,"password"=>$request->password])){

            return redirect()->route("admin.dashboard");

        }else{

            toastr()->error("The Email Or Password Is Not Correct");
            return redirect()->back()->withErrors(["message"=>"The Email Or Password Is Not Correct"]);
        }



    }


    public function login_form(){


        return view("admin.account.login");
    }


    public function logout(){

        auth("web")->logout();
        return redirect()->route("admin.form_login");

    }


    public function profile(){

        return view("admin.account.show_profile");


    }


    public function update_profile(update_profilerequest $request){

        try{

            $this->user->update($request);
            return redirect()->route("admin.dashboard");
        }catch(\Exception $ex){

            return $ex->getMessage();
            return redirect()->back()->withErrors(["message"=>"We Have Error"]);
        }




    }

}
