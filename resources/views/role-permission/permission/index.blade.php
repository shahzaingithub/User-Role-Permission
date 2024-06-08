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
                        <h4>Permission</h4>
                        <a href="{{ url('permissions/create') }}" class="btn btn-primary float-end">Add Permission</a>
                    </div>  
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    @role('super admin')
                                    <td><a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn btn-danger btn-sm">Delete</a></td>
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
    

