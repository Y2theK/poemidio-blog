@extends("layouts.app")
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            {{-- //image template --}}
            <div class="my-3 d-flex justify-content-center align-items-center flex-wrap">


                <div class="mr-4 mb-sm-4">
                    <img src="/images/bg.jpg" alt="" width="150px" height="150px"
                        class="border-4 border-danger rounded-circle">
                </div>
                <div class=" ">
                    <p class="text-light">Name - {{ $user->name }}</p>
                    <p class="text-light">Email - {{ $user->email }}</p>
                    <p class="text-light">Role - <span class="badge  badge-warning">{{
                            $user->getRoleNames()->first()}}</span> </p>
                    <a href="#" class="btn btn-danger btn-sm mt-3">Update Profile</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 h5 d-flex justify-content-between align-items-center">
        <p>Your Posts</p>
        <p class="badge badge-warning">{{ $user->articles()->count() }}</p>
    </div>
    @forelse ($user->articles()->get() as $article)

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
            <p class="text-light h5 poem-title">"{{$article->title}}"</p><br>

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