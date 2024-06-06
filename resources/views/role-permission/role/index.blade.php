
@extends('layout.layout')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Role</h4>
                        <a href="{{ url('roles/create') }}" class="btn btn-primary float-end">Add Role</a>
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
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td><a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    

