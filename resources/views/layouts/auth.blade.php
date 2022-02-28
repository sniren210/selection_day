<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Pemilu Raya FEB TEL-U">
    <meta name="description" content="Pemilihan Raya Fakultas Ekonomi dan BIsnis Telkom University.">
    <meta name="keywords" content="PemiraFeb,Pemilu pemilihan,Pemilu Raya FEB TEL-U,Telkom University">
    <meta http-equiv="Copyright" content="Sniren-ren">
    <meta name="author" content="Sniren-ren">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">

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
                <a href="{{ url('./') }}" class="navbar-brand">
                    <img src="{{ asset('./img/PEMIRA.png') }}" alt="PEMIRA"
                        class="brand-image img-circle elevation-3 mx-2">
                    <img src="{{ asset('./img/BPR.png') }}" alt="BPR" class="brand-image img-circle elevation-3 mx-2">
                    <img src="{{ asset('./img/KPR.png') }}" alt="KPR" class="brand-image img-circle elevation-3 mx-2">
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3 justify-content-end" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">

                        <li class="nav-item ">
                            <a href="{{ url('/') }}"
                                class="nav-link  {{ Request::segment(1) === null ? 'active' : '' }}"> Home</a>
                        </li>

                        <li class="nav-item ">
                            <a href="{{ url('/vote-start') }}"
                                class="nav-link  {{ Request::segment(1) === 'vote-start' ? 'active' : '' }}">Vote</a>
                        </li>
                        @guest

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(1) === 'login' ? 'active' : '' }}"
                                        href="{{ route('login') }}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(1) === 'register' ? 'active' : '' }}"
                                        href="{{ route('register') }}">Register</a>
                                </li>
                            @endif
                        @else
                            @if (auth()->user()->level != 0)
                                <li class="nav-item ">
                                    <a href="{{ url('/dashboard') }}"
                                        class="nav-link  {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">Dashboard</a>
                                </li>
                            @endif
                            <li class="nav-item ">
                                <a href="{{ url('/user/show') }}"
                                    class="nav-link  {{ Request::segment(1) === 'user' ? 'active' : '' }}">Profile</a>
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

                <strong>Copyright &copy; 2021 <a href="mailto:femirafeb@gmail.com">PemiraFeb</a>.</strong>
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
