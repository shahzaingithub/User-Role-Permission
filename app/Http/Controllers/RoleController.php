<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 
use Illuminate\Support\Facades\DB;

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
    public function AddPermission($roleId)
    {
        $permissions=Permission::get();
        $role=Role::findOrfail($roleId);
        $rolepermission=DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id',$role->id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();
        return view('role-permission.role.Addpermission',compact('role','permissions','rolepermission'));
    }
    public function givepermissiontorole($roleId,Request $request)
    {
        $request->validate([
            'permission' => [
                'required',
            ]
            ]);
            $role=Role::findOrfail($roleId);
            $role->syncPermissions($request->permission);
        return redirect()->back()->with('status', 'Permission added to role');
    }
}
