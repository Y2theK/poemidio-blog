@extends("layouts.app")
@section('content')
<div class="container-fluid">
    <div class="h4">All Poems {{$name}}</div>
    @if (session('info'))
    <div class="alert alert-info">{{session('info')}}</div>
    @endif
    @foreach ($articles as $article)
    <div class="card px-2">
        <div class="card-bodyfitter mt-3">
            <h6 class="card-title poem-title">{{$article->title}}</h5>

                <span class=""> Category : <span
                        class="badge badge-warning rounded-pill">{{$article->category->name}}</span></span>
                <span class="ml-2">Posted By : <span
                        class="badge badge-warning rounded-pill">{{$article->user->name}}</span></span>
        </div>
        <div class=" my-2 "><span class="text-muted small">{{$article->created_at->diffForHumans()}}</span>
        </div>

        <p class="card-text">
        <p class="text-light h5 poem-title">"{{$article->title}}"</p><br>

        <pre>{{$article->description}}</pre>

        <div class="mb-2">
            <a href="{{url("/articles/detail/$article->id")}}" class="card-link
                ">READ MORE
                &raquo;</a>
        </div>

    </div>
    @endforeach

</div>
@endsection