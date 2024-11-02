<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminDashboardController extends Controller
{
    //
    public function index(){
        return view("admin.index");
    }

    public function users(){
        $users = User::all();
        $roles=Role::all();
        return view("admin.users.list_users",compact("users","roles"));
    }
}
