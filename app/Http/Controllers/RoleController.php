<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    public function index()
    {
        $roles=Role::get();
        return view('role-permission.role.index',compact('roles'));
    }
    public function create()
    {
        return view('role-permission.role.create');

    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name',
        ]
            ]);
            Role::create([
                'name' => $request->name
            ]);
        return redirect('roles')->with('status', 'Role created successfully');
      
    }
    public function edit(Role $role)
    {

        return view('role-permission.role.edit',compact('role'));
    }
    public function update(Role $role,Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,'.$role->id,
        ]
            ]);
            $role->update([
                'name' => $request->name
            ]);
        return redirect('roles')->with('status', 'Roles Updated successfully');
    }
    public function destroy($roleId)
    {
        $role=Role::find($roleId);
        $role->delete();
        return redirect('roles')->with('status', 'Role deleted successfully');
    }   
}
