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
    <form action="{{url("articles/add")}}" class="form" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Your Title Here">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="4" class="form-control"
                placeholder="Your Preview / description Here"></textarea>
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control"
                placeholder="Your Content Here"></textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" id="category" class="form-control">
                @foreach ($categories as $category)
                <option value="{{$category['id']}}">{{$category['name']}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Add Article" class="btn btn-primary float-right">
        <input type="reset" value="Cancel" class="btn btn-outline-info float-right mr-2">
    </form>

</div>
@endsection