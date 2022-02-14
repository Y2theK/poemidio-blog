<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
        integrity="sha512-fzff82+8pzHnwA1mQ0dzz9/E0B+ZRizq08yZfya66INZBz86qKTCt9MLU0NCNIgaMJCgeyhujhasnFUsYMsi0Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <script src="{{asset('js/main.js')}}" type=""></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md  navbar-dark bg-dark shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fa fa-biohazard"></i>
                    {{ config('app.name', 'Laravel') }}
                </a>
                @auth
                <ul class="navbar-nav my-auto ml-auto" id="notificationIcon">
                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('profile.notification',auth()->id()) }} ">
                            <i class="far fa-bell"></i>

                            <span class="badge badge-info">{{
                                auth()->user()->unreadNotifications->where('type','App\Notifications\CommentCreatedNotification')->count()
                                }}</span>

                        </a>
                    </li>



                </ul>

                <ul class=" ml-auto my-auto" id="logOutDropDown">

                    <li class="dropdown ">
                        <a id="navbarDropdown" class=" dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right  " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>

                @endauth

                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item">
                            <a href="{{ route('articles.index')}}" class="nav-link text-info">~ All Articles</a>

                        </li>
                        @auth

                        <li class="nav-item">
                            <a href="{{ route('profile.index',auth()->id())}}" class="nav-link text-info">@ Your
                                Profile</a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ route('articles.add')}}" class="nav-link text-info">+ Add Article</a>

                        </li>


                        <li class="nav-item">
                            <a href="{{route('categories.index')}}" class="nav-link text-info">&
                                Categories</a>

                        </li>
                        @endauth

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else

                        <li class="nav-item">

                            <a class="nav-link" href="{{ route('profile.notification',auth()->id()) }} ">
                                <i class="far fa-bell"></i>
                                <span class="badge badge-info ">{{
                                    auth()->user()->unreadNotifications->where('type','App\Notifications\CommentCreatedNotification')->count()
                                    }}</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right  " aria-labelledby="navbarDropdown">
                                <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="margin-bottom: 80px">
            @yield('content')
            <div class="container">
                {{-- <div class="my-3 mb-3">
                    <a class="btn btn-dark " onclick="goBack()">BACK</a>

                </div> --}}

            </div>

            <div class="navigation">

                <ul class="navi" id="mobile-nav">


                    @guest
                    <li class="nav-items"><a href="{{url('/login')}}" class="nav-link">
                            <div class="icon-text {{Request::segment(1) == 'login' ? 'active' : ''}}">
                                <p> <i class="fa fa-sign-in-alt"></i></p>
                                <p>Login</p>
                            </div>
                        </a></li>


                    @endguest
                    <li class="nav-items"><a href="{{route('articles.index')}}" class="nav-link">
                            <div class="icon-text   {{Request::segment(1)." /".Request::segment(2)=='articles /'
                                ? 'active' : '' }}">
                                <p> <i class="fa fa-house"></i></p>
                                <p>Home</p>
                            </div>

                        </a></li>
                    @guest
                    <li class="nav-items"><a href="{{url('/register')}}" class="nav-link">
                            <div class="icon-text  {{Request::segment(1) == 'register' ? 'active' : ''}}">
                                <p><i class="fa fa-arrow-up-from-bracket"></i></p>

                                <p>Register</p>
                            </div>
                        </a></li>

                    @endguest


                    @auth

                    <li class="nav-items"><a href="{{route('articles.add')}}" class="nav-link">
                            <div class="icon-text {{Request::segment(1)." /".Request::segment(2)=='articles /add'
                                ? 'active' : '' }}">
                                <p> <i class="fa fa-circle-plus"></i></p>
                                <p> Posts</p>
                            </div>
                        </a></li>
                    <li class="nav-items"><a href="{{route('categories.index')}}" class="nav-link">
                            <div class="icon-text   {{Request::segment(1) == 'categories' ? 'active' : ''}}">
                                <p> <i class="fa fa-list"></i></p>
                                <p>Categories</p>
                            </div>
                        </a></li>
                    <li class="nav-items"><a href="{{route('profile.index',auth()->id())}}" class="nav-link">
                            <div class="icon-text  {{Request::segment(1)." /".Request::segment(3)=='profile /'
                                ? 'active' : '' }}">
                                <p> <i class="fa fa-user"></i></p>
                                <p>Profile</p>
                            </div>
                        </a></li>
            </div>
            @endauth

    </div>

    </main>
    <footer>

    </footer>
    </div>
</body>

</html>