<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('user/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/slick-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/t-scroll.min.css') }}" rel="stylesheet">
    <link href="{{asset('user/css/file-input/fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{asset('user/css/file-input/theme.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('user/style.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <!-- Styles -->

    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    {{--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>--}}

    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}



    @yield('css')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-secondary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('index')}}"> Pagination </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('datatable-index')}}">Datatable</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('piechart-index')}}">Pie chart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('mymotivz.index')}}">Mymotivz</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                {{--<ul class="navbar-nav ml-auto">--}}
                {{--<!-- Authentication Links -->--}}
                {{--@guest--}}
                {{--@if (Route::has('login'))--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                {{--</li>--}}
                {{--@endif--}}

                {{--@if (Route::has('register'))--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                {{--</li>--}}
                {{--@endif--}}
                {{--@else--}}
                {{--<li class="nav-item dropdown">--}}
                {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"--}}
                {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                {{--{{ Auth::user()->name }}--}}
                {{--</a>--}}

                {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                {{--onclick="event.preventDefault();--}}
                {{--document.getElementById('logout-form').submit();">--}}
                {{--{{ __('Logout') }}--}}
                {{--</a>--}}

                {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
                {{--@csrf--}}
                {{--</form>--}}
                {{--</div>--}}
                {{--</li>--}}
                {{--@endguest--}}
                {{--</ul>--}}
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<!-- Scripts -->
{{--<script src="{{ asset('jquery-validation/dist/jquery.validate.min.js') }}" ></script>--}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="{{asset('new-panel\user-panel\assets\scripts\jquery.tagsinput.min.js')}}"></script>
<script src="{{asset('easy-number-separator.js')}}"></script>


{{--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>--}}
@yield('script')
</body>
</html>
