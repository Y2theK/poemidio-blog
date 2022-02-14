@extends("layouts.app")
@section('content')
<div class="container">
    <div class="h4">All Poems</div>
    @if (session('info'))
    <div class="alert alert-info">{{session('info')}}</div>
    @endif

    @forelse ($articles as $article)

    <div class="card px-2">
        <div class="card-bodyfitter mt-3">
            <h6 class="card-title poem-title">{{$article->title}}</h5>

                <span class=""> Category : <span class="badge badge-warning rounded-pill">{{$article->category->name ??
                        'Unknown';
                        }}</span></span>
                <span class="ml-2"> From : <span class="badge badge-warning rounded-pill">{{$article->user->name ??
                        'Unknown'}}</span></span>
        </div>
        <div class=" my-2 "><span class="text-muted small">{{$article->created_at->diffForHumans()}}</span>
        </div>

        {{-- //image template --}}
        {{-- <div class="col-md-6 card-image my-3 p-0">
            <img src="/images/bg.jpg" alt="" width="100%">
        </div> --}}

        <div class="">
            <p class="text-light h5 poem-title">{{$article->title}}</p><br>

            <pre>{{$article->description}}</pre>

            <div class="mb-2 d-flex article-footer">
                <a href="{{route('articles.detail',$article->id)}}" class="card-link
                    ">READ MORE
                    &raquo;</a>
                <div class="like-comment-count">
                    {{-- soon i will change this view icon to like icon so that we can give like to our post --}}
                    <a class="card-link">&#x1F440; {{rand(1,100)}}</a>

                    <a href="{{route('articles.detail',$article->id)}}" class="card-link">{{count($article->comments)}}
                        <i class="fa fa-comment"></i></a>
                </div>
            </div>
        </div>


    </div>
    @empty

    <div class="container ">
        <div class="card mt-3">
            <div class="card-body text-capitalize h5">no article yet. try creating one..!


            </div>
        </div>
    </div>
    @endforelse

</div>
@endsection