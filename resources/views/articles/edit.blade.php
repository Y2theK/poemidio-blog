@extends('layouts.app')

@section('content')

<div class="container">

    <form action="{{url("/articles/edit")}}" class="form" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{$article->title}}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="4"
                class="form-control">{{$article->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{$article->body}}</textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" id="category" class="form-control">
                @foreach ($categories as $category)
                @if ($category->id == $article->category->id)
                <option value="{{$article->category->id}}" selected>{{$article->category->name}}</option>
                @else
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endif

                @endforeach



            </select>
        </div>
        <input type="submit" value="Update Article" class="btn btn-warning">
    </form>

</div>
@endsection