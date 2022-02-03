@extends('layouts.master')
@section('breadcumb')
<div class=" container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item "><a href="">Roles</a></li>
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
            <!-- Input addon -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit Role</h3>
                </div>
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

                    <div class="row">
                        <div class="col-md-6">
                            <!-- form -->
                            <form action="{{ route('admin.roles.update',$role->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Role Name</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $role->name }}" name="role">
                                </div>
                                <div class="form-group">
                                    @foreach ($allPermissions as $permission)
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" name="permissions[]"
                                            id="{{ $permission->id }}" {{ $role->permissions->contains($permission) ?
                                        'checked' : ''; }}>
                                        <label for="{{ $permission->id }}" class="custom-control-label">{{
                                            $permission->name
                                            }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <input type="submit" value="Update" class="btn btn-dark">
                                <input type="reset" value="Cancel" class="btn btn-outline-dark">
                            </form>

                        </div>
                    </div>


                    {{-- <a href="" class="btn btn-dark ">Update</a> --}}
                    {{-- <a href="" class="btn btn-outline-dark ">Cancel</a> --}}
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
<!-- /.card -->
@endsection