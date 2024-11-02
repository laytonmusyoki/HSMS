<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //
    public function permissions(){
        $permissions = Permission::all();
        return view("admin.users.permissions", compact("permissions"));
    }

    public function addPermission(Request $request){
        Permission::create(['name'=>$request->name]);
        return redirect()->back()->with('success','Permission Added successfully');
    }
}
