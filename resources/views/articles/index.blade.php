@extends("layouts.app")
@section('content')
<div class="container">
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
                <span class="ml-2"> From : <span
                        class="badge badge-warning rounded-pill">{{$article->user->name}}</span></span>
        </div>
        <div class=" my-2 "><span class="text-muted small">{{$article->created_at->diffForHumans()}}</span>
        </div>
        {{-- <div class="row"> --}}
            <div class="col-md-6 card-image my-3 p-0">
                {{-- <img src="/images/bg.jpg" alt="" width="100%"> --}}
            </div>

            <div class="">
                <p class="text-light h5 poem-title">"{{$article->title}}"</p><br>

                <pre>{{$article->description}}</pre>

                <div class="mb-2 d-flex article-footer">
                    <a href="{{route('articles.detail',$article->id)}}" class="card-link
                    ">READ MORE
                        &raquo;</a>
                    <div class="like-comment-count">

                        <a href="{{route('articles.detail',$article->id)}}" class="card-link">{{rand(1,100)}} <i
                                class="fa fa-heart"></i></a>

                        <a href="/articles/detail/{{$article->id}}" class="card-link">{{count($article->comments)}}
                            <i class="fa fa-comment"></i></a>
                    </div>
                </div>
            </div>
            {{--
        </div> --}}

    </div>
    @endforeach

</div>
@endsection