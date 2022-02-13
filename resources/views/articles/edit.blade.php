@extends('layouts.app')

@section('content')

<div class="container">

    <div class="h4">Edit Poems</div>
    <div class="card p-2">
        <form action="{{route('articles.update',$article->id)}}" class="form" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{old('title',$article->title)}}">
                @error('title')
                <p class="text-danger">{{$errors->first('title')}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="4"
                    class="form-control">{{old('description',$article->description)}}</textarea>
                @error('description')
                <p class="text-danger">{{$errors->first('description')}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" rows="8"
                    class="form-control">{{old('body',$article->body)}}</textarea>
                @error('body')
                <p class="text-danger">{{$errors->first('body')}}</p>
                @enderror
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

</div>
@endsection