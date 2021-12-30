@extends('layouts.app')

@section('content')

<div class="container">
    <ul class="list-group my-2 bg-dark">
        @if ($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </div>
        @endif
        {{-- <form action="{{route('categories.create')}}" class="mt-5" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">New Category</label>
                <input type="text" name="name" class="form-control" placeholder="New Category Here">
            </div>
            <input type="submit" value="Create" class="btn btn-warning float-right mb-3">

        </form> --}}
        <li class="list-group-item bg-dark text-info"><b> {{count($categories)}} categories </b></li>
        @foreach ($categories as $category)

        <li class="list-group-item bg-dark">
            <div class="d-flex">

                <span class="card-text flex-fill">{{$category->name}}</span>
                @if (Gate::allows('edit-delete',$category))
                <a href="{{route('categories.delete',$category->id)}}" class="close text-warning">&times</a>
                @endif

            </div>
            <span class=" text-muted small"> {{$category->created_at->diffForHumans()}}</span>



        </li>

        @endforeach
    </ul>

</div>
@endsection