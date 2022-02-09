@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header h4">{{ __('Welcome From My First Laravel Blog') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="{{route('articles.index')}}">Click Here To Join Our Little Community.</a>

                </div>
            </div>
        </div>
        <div class="col-11 ">
            <h4>Read Me</h4>
            <p class="text-muted">Welcome to my first ever small laravel blog app. Since I am new to laravel, if I do
                wrong, Feel
                free to teach me or advice me. Any kind of advices or recommendations are welcome.</p>
            <h6>Visitor Panel</h5>
                <ul type="square" class="text-muted">
                    <li>Visitor can read articles,articles details and comments even if he / she donesn't have acoount.
                    </li>
                    <li>Visitor must register account if they want to post something or comments.</li>
                </ul>
                <h6>User Panel</h5>
                    <ul type="square" class="text-muted">
                        <li>User can post articles under given categories. </li>
                        <li>User can also comment under all articles.</li>
                        <li>User can edit and delete only their articles.</li>
                        <li>User can also delete their comments.</li>
                    </ul>
                    <h6>Admin Panel (comming soon)</h5>
                        <ul type="square" class="text-muted">
                            <li>Admin can do anything from user panel. </li>
                            <li>Admin can manage(delete or edit) all articles, comments and user account.</li>
                            <li>Admin can create new categories.</li>
                            <li>Admin can change user from user mode to admin mode.</li>
                        </ul>
                        <h4>Upcoming Feature</h4>
                        <ul type="circle" class=" text-muted">
                            <li>Exploring new categories.</li>
                            <li>Commenting with no reloading.</li>
                            <li>Creating Own Profile.</li>
                            <li>Reviewing Other Profile.</li>
                            <li>Of course Dark mode</li>
                        </ul>
        </div>


    </div>
</div>
@endsection