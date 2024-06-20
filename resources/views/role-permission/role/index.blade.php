
@include('layouts.app')

<!-- Search -->
<div class="container mb-4">
     <form class="form-inline" method="GET" action="{{ route('roles.index') }}">
        <input class="form-control mr-sm-4 mb-2" type="search" placeholder="Search"
               aria-label="Search" value="{{ request('search') }}" name="search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
<!-- Search -->

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

                                    <td><a href="{{ url('roles/'.$role->id.'/AddPermission') }}" class="btn btn-warning btn-sm">Add Permission</a></td>
                                    @role('super admin')
                                    <td><a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-danger btn-sm">Delete</a></td>
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