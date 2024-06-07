
@extends('layout.layout')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
              @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
                @endif 
                <div class="card">
                    <div class="card-header">
                        <h4>Role : {{ $role->name }}</h4>
                        <a href="{{ url('roles') }}" class="btn btn-danger float-end">Back</a>
                    </div>     
                    <form action="{{ url('roles/'.$role->id.'/AddPermission') }}" method="post">
                        @csrf 
                        @method('PUT')
                        <div class="card-body">
                           
                               @error('permission')
                               <span class="text-danger">{{ $message }}</span>
                               @enderror
                           
                            <div class="form-group">
                                <label for="name">Permission</label>
                               <div class="row">
                                   @foreach($permissions as $permission)
                                       <div class="col-md-3">
                                         
                                              <label for="">
                                                  <input type="checkbox" 
                                                  name="permission[]"
                                                   value="{{ $permission->name }}"
                                                   {{in_array($permission->id, $rolepermission) ? 'checked' : '' }} 
                                                   /> 
                                                   {{ $permission->name }}
                                              </label>

                                                
                                          
                                       </div>
                                   @endforeach
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
    

