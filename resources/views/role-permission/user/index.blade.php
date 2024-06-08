
@include('layouts.app')

@extends('layout.layout')


    @include('role-permission.nav-link')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Role</h4>
                        <a href="{{ url('users/create') }}" class="btn btn-primary float-end">Add Users</a>
                    </div>  
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $rolename)
                                        <label class="badge bg-success">{{ $rolename }}</label>
                                        @endforeach
                                        @endif
                                    </td>
                                    @role('super admin')
                                    <td><a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><a href="{{ url('users/'.$user->id.'/delete') }}" class="btn btn-danger btn-sm">Delete</a></td>
                                    @endrole
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    

