<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fintch Website by fintch team">
    <meta name="keywords" content="Fintch web, fintch ,fintch ">
    <meta http-equiv="Copyright" content="Sniren-ren">
    <meta name="author" content="Sniren-ren">
    <meta itemprop="image" content="{{ asset('img/favicon.ico') }}">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('img/favicon.ico') }}" />

    <title>{{ config('app.name') }} | {{ $title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('') }}css/adminlte.min.css">

    <link href="http://fonts.cdnfonts.com/css/gotham" rel="stylesheet">

    <style>
        body {
            font-family: 'Gotham', sans-serif;
        }

    </style>

</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="{{ url('./') }}" class="brand-text font-weight-bold">{{ config('app.name') }}</a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3 justify-content-end" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">

                        @guest
                            <li class="nav-item ">
                                <a href="{{ url('/vote') }}"
                                    class="nav-link  {{ Request::segment(1) === 'vote' ? 'active' : '' }}">Vote</a>
                            </li>

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item ">
                                <a href="{{ url('/') }}"
                                    class="nav-link  {{ Request::segment(1) === null ? 'active' : '' }}"> Home</a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('/user/' . Auth::user()->id) }}"
                                    class="nav-link  {{ Request::segment(1) === 'user' ? 'active' : '' }}">Profile</a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ url('/vote') }}"
                                    class="nav-link  {{ Request::segment(1) === 'vote' ? 'active' : '' }}">Vote</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link"
                                    onclick="event.preventDefault();
                                                                                                                         document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content-wrapper">

            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="container">

                <strong>Copyright &copy; 2021 <a href="mailto:fintch.team@gmail.com">Fintch tech</a>.</strong>
                All rights reserved.
            </div>
        </footer>
    </div>


    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}js/adminlte.min.js"></script>

    @yield('js')

</body>

</html>
