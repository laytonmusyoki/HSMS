<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    //
    public function login(){
        return view("admin.auth.login");
    }
    public function loginAdmin(Request $request){
        $request->validate([
            "email"=> "required",
            "password"=> "required",
        ]);

        $user = User::where("email",$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                auth()->login($user);
                return redirect()->route('admin.dashboard');
            }
            else{
                return redirect()->back()->with("error","Wrong Password");
            }
        }
        else{
            return redirect()->back()->with("error","User not Found");
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('admin.login')->with("error","You have been logged out");
    }
}
