@extends('layouts.app')

@section('content')

<div class="container">
    @if ($errors->any())
    <div class="alert alert-warning">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </div>
    @endif
    <form action="{{url("/categories/create")}}" class="mt-5" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">New Category</label>
            <input type="text" name="name" class="form-control" placeholder="New Category Here">
        </div>
        <input type="submit" value="Create" class="btn btn-warning float-right">
        {{-- <input type="reset" value="Cancel" class="btn btn-outline-info float-right mr-2"> --}}
    </form>

</div>
@endsection