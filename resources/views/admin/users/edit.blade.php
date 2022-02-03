@extends('layouts.master')
@section('breadcumb')
<div class=" container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item "><a href="">Users</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- form -->
                    <form action="{{ route('admin.users.update',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">
                                <code>Name</code></label>
                            <input type="text" class="form-control form-control-border border-width-2" id="name"
                                name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">
                                <code>Email</code></label>
                            <input type="text" class="form-control form-control-border border-width-2" id="email"
                                name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="roles">
                                <code>Roles</code></label>
                            <select class="custom-select form-control-border border-width-2" id="roles" name="roles[]">
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->roles->contains($role) ? 'selected' : '' }}>{{
                                    $role->name }}
                                </option>

                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            @foreach ($allPermissions as $permission)
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permissions[]"
                                    value="{{ $permission->id }}" id="{{ $permission->id }}" {{
                                    $user->permissions->contains($permission) ?
                                'checked' : ''; }}>
                                <label for="{{ $permission->id }}" class="custom-control-label">{{
                                    $permission->id
                                    }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <input type="submit" value="Update" class="btn btn-dark">
                        <input type="reset" value="Cancel" class="btn btn-outline-dark">
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        {{-- col --}}
    </div>
    {{-- row --}}
</div>
{{-- container-fluid --}}
@endsection