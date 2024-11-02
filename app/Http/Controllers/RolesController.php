<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    //
    public function roles(){
        $roles=Role::all();
        $permissions=Permission::all();
        return view("admin.users.roles",compact("roles","permissions"));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array'
        ]);
        $role=Role::create(['name'=>$request->name]);

        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name');
        $role->syncPermissions($permissions);
        return redirect()->back()->with('success','Role created successfully');
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=> 'required',
            'permissions'=> 'required'
        ]);
        $role=Role::findOrFail($id);
        $role->update(['name'=>$request->name]);
        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name');
        $role->syncPermissions($permissions);
        return redirect()->back()->with('success','Roles updated');
    }

    public function destroy($id){
        $role=Role::findOrFail($id);
        $role->delete();
        return redirect()->back()->with('success','Role deleted successfully');
    }

    public function updateRoles(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Update user roles (assuming the roles are stored in a pivot table)
    $user->roles()->sync($request->roles);

    return redirect()->back()->with('success','Users updated');
}

}
