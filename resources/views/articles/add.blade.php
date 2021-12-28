@extends('layouts.app')

@section('content')

<div class="container">

    <form action="{{route('articles.create')}}" class="form" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Poem Title">
            @error('title')
            <p class="text-danger">{{$errors->first('title')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="4" class="form-control"
                placeholder="Poem's Short Preview"></textarea>
            @error('description')
            <p class="text-danger">{{$errors->first('description')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" cols="30" rows="8" class="form-control" placeholder="Poem Body"></textarea>
            @error('body')
            <p class="text-danger">{{$errors->first('body')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" id="category" class="form-control">
                @foreach ($categories as $category)

                <option value="{{$category->id}}">{{$category->name}}</option>


                @endforeach



            </select>
        </div>
        <input type="submit" value="Create Article" class="btn btn-warning float-right">
    </form>

</div>
@endsection