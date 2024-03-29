<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | CRM</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    @yield('styles')

    <style>
        .badges{
            color: #FFF;
            font-size: 10px;
            background-color: #000;
            margin-left: 10px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .align-div {
            align-items: center;
            align-content: center;
        }
    </style>

   <link rel="stylesheet" href="{{ url('public/css/app.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light" style="height: 100px">
            <a class="navbar-brand" href="#">CRM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Notifications
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-light shadow-lg" style="background-color: #0A4D79">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFF!important; font-size: 18px; padding: 15px" href="{{ url('/') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFF!important; font-size: 18px; padding: 15px" href="{{ route('users.index') }}">{{ __('Users') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFF!important; font-size: 18px; padding: 15px" href="{{ route('users.create') }}">{{ __('Add User') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFF!important; font-size: 18px; padding: 15px" href="{{ route('tickets.index') }}">{{ __('Support Ticket') }}</a>
                    </li>
                    {{--                        <li class="nav-item">--}}
                    {{--                            <a class="nav-link" style="color: #FFF!important; font-size: 18px; padding: 15px" href="{{ url('/') }}">{{ __('Open Ticket') }}</a>--}}
                    {{--                        </li>--}}
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFF!important; font-size: 18px; padding: 15px" href="{{ route('callrail.accounts') }}">{{ __('Call Rail') }}</a>
                    </li>
                </ul>

                <div class="form-inline my-2 my-lg-0">

                    <ul class="navbar-nav mr-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #FFF!important" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #FFF!important" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: #FFF!important" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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


        <main class="py-4">

            <div class="px-4">
                <div class="row justify-content-center">

                    <div class="col-md-4">

                        <info-component :user="{{ auth()->user() }}"></info-component>

                        <contact-component></contact-component>

                    </div>

                    @yield('content')
                </div>
            </div>

        </main>

        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2022 Copyright:
                <a class="text-reset fw-bold" href="#">Company Name</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ url('public/main.js') }}"></script>
    <script src="{{ url('public/js/app.js') }}"></script>

    @yield('scripts')
</body>
</html>
