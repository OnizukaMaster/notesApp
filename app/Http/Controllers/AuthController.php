<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login(Request $request){
        return view("auth.login");
    }

    public function loginuser(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        $user = User::where("email","=",$request->email)->first();

        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->Session()->put("loginid",$user);
                return redirect()->route("dashboard");
            }
            else{
                return back()->with("failed","Email or password incorrect");
            }
        }
        else{
                return back()->with("failed","Not account found");
            
        }
    }

    public function register(){
     
        return view("auth.register");
    }

    public function registeruser(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8",
            "cpassword" => "required|same:password"
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $res = $user->save();

        if($res){
            return redirect()->route('login')->with("success","Account created successfully!! Login");
        }
        else{
            return back()->with("failed","Something went wrong");
        }
       
    }

    public function logout(){
        if(Session()->has("loginid")){
            Session()->flush();
            return redirect()->route("login");
        }
    }
}
