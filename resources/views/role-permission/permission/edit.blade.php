
@extends('layout.layout')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Permission</h4>
                        <a href="{{ url('permissions') }}" class="btn btn-danger float-end">Back</a>
                    </div>     
                    <form action="{{ url('permissions/'.$permission->id) }}" method="post">
                        @csrf 
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{ $permission->name }}" class="form-control">
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
    

