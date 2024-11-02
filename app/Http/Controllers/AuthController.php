<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(){
        return view("auth.login");
    }
    public function loginUser(Request $request){
        $request->validate([
            "email"=> "required",
            "password"=> "required",
        ]);

        $user = User::where("email",$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                auth()->login($user);
                return redirect()->route('user.dashboard');
            }
            else{
                return redirect()->back()->with("error","Wrong Password");
            }
        }
        else{
            return redirect()->back()->with("error","User not Found");
        }
    }

    public function register(){
        return view("auth.register");
    }
    public function registerUser(Request $request){
        $request->validate([
            "name"=> "required",
            "phone"=> "required",
            "email"=> "required |unique:users",
            "password"=> "required | min:6 |confirmed"
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect()->route('user.login')->with("success","Account created for ". $user->name ."");
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('user.login')->with("success","You have been logged out");
    }
}
