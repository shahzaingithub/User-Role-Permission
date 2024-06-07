
@extends('layout.layout')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit User</h4>
                        <a href="{{ url('users') }}" class="btn btn-danger float-end">Back</a>
                    </div>     
                    <form action="{{ url('users/'.$user->id) }}" method="post">
                        @csrf 
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" name="email" readonly value="{{ $user->email }}" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Password</label>
                                <input type="password" name="password" value="{{ $user->password }}" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Roles</label>
                                <select name="role[]" id="role" class="form-control" multiple>
                                    @foreach($roles as $role)
                                    <option value="{{ $role }}"
                                    {{in_array($role, $userRole) ? 'selected' : '' }}
                                    >{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>       
                </div>
            </div>
        </div>
    </div>
    

