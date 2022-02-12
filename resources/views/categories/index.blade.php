@extends('layouts.app')

@section('content')

<div class="container">
    <div class="h4">Categories</div>
    <div class="card px-2">
        <ul class="list-group  bg-dark">
            @if (session('info'))
            <div class="alert alert-info">{{session('info')}}</div>
            @endif
            @can('category-create')
            <form action="{{route('categories.create')}}" class="mt-5" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">New Category</label>
                    <input type="text" name="name" class="form-control" placeholder="New Category Here">
                    <p class="text-danger">{{$errors->first()}}</p>
                </div>
                <input type="submit" value="Create" class="btn btn-warning float-right mb-3">

            </form>
            @endcan

            <li class="list-group-item bg-dark text-info"><b> {{count($categories)}} categories </b></li>
            @foreach ($categories as $category)

            <li class="list-group-item bg-dark">
                <div class="d-flex">

                    <span class="card-text flex-fill">{{$category->name}}</span>
                    @if (Gate::allows('owner-delete-category',$category))
                    <a href="{{route('categories.delete',$category->id)}}" class="close text-warning"
                        onclick="return confirm('Are you sure?')">&times</a>
                    @endif

                </div>
                <span class=" text-muted small"> {{$category->created_at->diffForHumans()}}</span>



            </li>

            @endforeach
        </ul>
    </div>

</div>
@endsection