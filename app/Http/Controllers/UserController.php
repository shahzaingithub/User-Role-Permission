<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{
    public function index()
    {
        $users=User::get();
        return view('role-permission.user.index',compact('users'));
    }

    public function create()
    {
        $roles=Role::pluck('name','name')->all();
        return view('role-permission.user.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:users,name',
            ],
            'email'=>[
                'required',
                'string',
                'unique:users,email',
            ],
            'password'=>[
                'required',
                'string',
            ],  
        ]);
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->syncRoles($request->role);
        return redirect('users')->with('status', 'User created successfully');
    }

    public function edit(User $user)
    {
        $roles=Role::pluck("name","name")->all();

        $userRole=$user->roles->pluck('name','name')->all();
        

        return view('role-permission.user.edit',compact('user','roles','userRole'));
    }

    public function update(User $user,Request $request)
    {
        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:users,name,'.$user->id,
            ],
            'email'=>[
                'required',
                'string',
                'unique:users,email,'.$user->id,
            ],
            'password'=>[
                'nullable',
                'required',
                'string',
            ],  
        ]);
       $data=[
           'name' => $request->name,
           'email' => $request->email,
       ];
       if(!empty($request->password)){
           $data+=[
               'password' =>Hash::make($request->password),
           ];
       }
       $user->update($data);
       $user->syncRoles($request->role);

       return redirect('users')->with('status', 'User updated successfully');
    }

    public function destroy($userId)
    {
        $user=User::findOrfail($userId);
        $user->delete();
        return redirect('users')->with('status', 'User deleted successfully');
    }
          
}
