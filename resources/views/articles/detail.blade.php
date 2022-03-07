@extends('layouts.app')

@section('content')
<div class="container">
    <div class="h3">Full Version</div>
    @if (session('info'))
    <div class="alert alert-info">{{session('info')}}</div>
    @endif
    <div class="card mb-2 px-2">
        <div class="card-bodyfitter mt-3">
            <h6 class="card-title poem-title">{{$article->title}}</h5>
                <div class="mb-3">
                    {{-- add autoplay attr in detail page --}}
                    {{-- <audio controls>
                        <source src="{{ asset('audios/ac.mp3') }}" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio> --}}
                </div>
                {{-- <audio src="{{ storage_path('app/public/audios/taymyr-aungchaing.weba') }}">asdfas</audio> --}}
                <span class=""> Category : <span class="badge badge-warning rounded-pill">{{$article->category->name??
                        'Unknown'}}</span></span>
                <span class="ml-2">Posted By : <span class="badge badge-warning rounded-pill">{{$article->user->name ??
                        'Anormyous'}}</span></span>
        </div>
        <div class="card-subtitle mt-2 "><span class="text-muted small">{{$article->created_at->diffForHumans()}}</span>
        </div>

        <p class="card-text">
        <p class="text-light h5 poem-title">"{{$article->title}}"</p><br>

        <pre>{{$article->body}}</pre>
        </p>

        @can('owner-edit-delete-post', $article)
        <div class="p-2">
            <a href="{{route('articles.delete',$article->id)}}" onclick="return confirm('Are you sure to delete..?');"
                class="btn btn-outline-light float-right
                ">Delete</a>
            <a href="{{route('articles.edit',$article->id)}}" class="btn btn-primary float-right mr-2">Edit</a>


        </div>
        @endcan

        <hr>
        @auth
        <ul class="list-group my-2 bg-dark" id="comments-section">


            <form action="{{route('comments.create')}}" method="POST">
                @csrf
                <input type="hidden" class="form-control" name="article_id" value="{{$article->id}}">
                <div class="mb-3">
                    <textarea name="content" id="content" cols="30" rows="3" placeholder="Add New Comment"
                        class="form-control "></textarea>
                    <p class="text-danger">{{$errors->first()}}</p>

                    <input type="submit" class="btn btn-info float-right my-2">
                </div>

            </form>
            @endauth

            @if (session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
            @endif

            <li class="list-group-item bg-dark text-info d-flex justify-content-between"><b>
                    {{count($article->comments)}} Comments </b>
                {{-- soon i will change this view icon to like icon so that we can give like to our post --}}

                {{rand(1,100)}} &#x1F440; </li>

            @foreach ($article->comments as $comment)

            <li class="list-group-item bg-dark">
                <div class="d-flex">

                    <span class="text-primary mr-2"> {{$comment->user->name}} </span> <span class="card-text flex-fill">
                        {{$comment->content}}</span>
                    @if (Gate::allows('owner-delete-comment',$comment))
                    <a href="{{route('comments.delete',$comment->id)}}" class="close text-warning"
                        onclick="return confirm('Are you sure to delete..?');">&times</a>
                    @endif


                </div>
                <span class=" text-muted small"> {{$comment->created_at->diffForHumans()}}</span>



            </li>

            @endforeach
        </ul>

    </div>
</div>
@endsection