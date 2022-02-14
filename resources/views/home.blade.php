@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header h4 text-center">{{ __('Welcome to "POEMIDIO"') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="{{route('articles.index')}}">Click Here To Join Our Little
                        Community.</a>

                </div>
            </div>
        </div>
        <div class="col-11 ">
            <h4>Read Me !!</h4>
            <p class="text-muted">Welcome to my first ever laravel social blog app called "POEMIDIO". This is a
                small
                poem-platform app which will deliver poems to poets and poem lovers.
                Any kind of advices or
                recommendations or bug reports are welcome. <span class="text-info"> If you need a laravel
                    developer, Feel Free to connect me.
                    We can
                    build some projects together.</span></p>
            <h5>- Visitor Panel -</h5>
            <ul type="square" class="text-muted">
                <li>Visitor can read articles,articles details and comments even if he / she donesn't have
                    acoount.
                </li>
                <li>Visitor must register account if they want to post something or comments.</li>
            </ul>
            <h5>- User Panel -</h5>
            <ul type="square" class="text-muted">
                <li>User can post articles under given categories. </li>
                <li>User can also comment under all articles.</li>
                <li>User can edit and delete only their articles/comments.</li>
                <li>User get notify when someone comment on their articles.</li>
            </ul>
            <h5>- Admin Panel -</h5>
            <ul type="square" class="text-muted">
                <li>Admin can check any data from admin dashboard. </li>
                <li>Admin can manage role or permissions via admin panel. </li>
                <li>Admin can manage(create, read, edit or delete) all articles, comments and user account.
                </li>
                <li>Admin and SuperUser can create new categories.</li>

            </ul>
            <h4>Upcoming Feature :</h4>
            <ul type="circle" class=" text-muted">
                <li>Exploring new awesome features.</li>
                <li>Commenting,liking & shareing without page refresh.</li>
                <li>More advanced notifications channel.</li>
                <li>Uploading Popcast of poetry reading.</li>
                <li>Of course Lignt Mode & Dark mode.</li>
            </ul>
            <h4>Stay Connected !</h4>
            <ul type="disc" class=" text-muted">
                <li>Github : <a href="https://github.com/Y2theK" target='_blank'>github.com/Y2theK</a> </li>
                <li>LinkedIn : <a href="https://www.linkedin.com/in/ye-yint-kyaw-85a030221"
                        target='_blank'>ye-yint-kyaw-85a030221</a>
                </li>
                <li>Email : <a href="mailto:y2thek13@gmail.com" target='_blank'>y2thek13@gmail.com</a> </li>

            </ul>
        </div>


    </div>
</div>
@endsection