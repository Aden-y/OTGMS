<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TGMS </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="{{ asset('js/map.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-primary bg-white shadow-sm"> --}}
            <nav class="navbar navbar-expand-md  navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                     OTGMS
                </a>
                <button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent" aria-expanded="false"
                 aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        @auth
                        <li class="nav-item">
                            <a href="/home" class="nav-link">Dashboard</a>
                        </li>
                            @admin
                            <li class="nav-item">
                                <a href="/attractions/create" class="nav-link">Register Attraction Site</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="usersDropDown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Manage Users
                                </a>
                                <div class="dropdown-menu" aria-labelledby="usersDropDown">
                                    <a class="dropdown-item" href="/admin/create">Create Admin</a>
                                    <a class="dropdown-item" href="/guides/create">Register Guide</a>
                                    <a class="dropdown-item" href="/users/admins">View Admins</a>
                                    <a class="dropdown-item" href="/users/guides">View Guides</a>
                                    <a class="dropdown-item" href="/users/tourists">View Tourists</a>
                                </div>
                            </li>
                            @endadmin
                        @endauth


                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                             <li class="nav-item dropdown">
                                <a id="userDropDown"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                   class="nav-link dropdown-toggle" href="#">
                                    @admin
                                   {{ Auth::user()->email }}
                                    @endadmin

                                    @guide
                                    {{ Auth::user()->guide->firstname.'  '.Auth::user()->guide->lastname }}
                                    @endguide

                                    @tourist
                                    {{ Auth::user()->tourist->firstname.'  '.Auth::user()->tourist->lastname }}
                                    @endtourist
                                </a>

                                <div class="dropdown-menu" aria-labelledby="userDropDown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>


                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<div class="text-center">
    <footer>
        <br>
        <br>
        <p>Copyright &copy; OTGMS 2020</p>
    </footer>
</div>
</body>
</html>
