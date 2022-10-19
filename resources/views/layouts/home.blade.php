<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="https://www.google.com/recaptcha/api.js?" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @livewireStyles
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbarhome navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="logo-image">
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid">
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @if (Auth::user())
                            <li class="nav-item ml-auto">
                                <a class="nav-link" href="/welcome">{{ __('Home') }}</a>
                            </li>
                        @endif
                        <li class="nav-item ml-auto">
                            <a class="nav-link" href="/services">{{ __('Services') }}</a>
                        </li>
                        <li class="nav-item ml-auto">
                                <a class="nav-link" href="/gallery">{{ __('Gallery') }}</a>
                            </li>
                        @if (Auth::user() && Auth::user()->role == 1)
                        <li class="nav-item ml-auto">
                            <a class="nav-link" href="/admin/gallery">{{ __('Admin Gallery') }}</a>
                        </li>
                        @endif
                        <li class="nav-item ml-auto">
                            <a class="nav-link" href="/aboutus">{{ __('About Us') }}</a>
                        </li>
                        @if (Auth::user() && Auth::user()->role == 0)
                            <li class="nav-item ml-auto">
                                <a class="nav-link" href="/pet">{{ __('My Pets') }}</a>
                            </li>
                        @endif
                        @if (Auth::user() && Auth::user()->role == 1)
                        <li class="nav-item ml-auto">
                            <a class="nav-link" href="/appointment">{{ __('Appointments') }}</a>
                        </li>
                        @endif
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="/login">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="/register">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- added list -->
                            {{-- <li class="nav-item ml-auto">
                                <a class="nav-link" href="/pet">{{ __('Pets') }}</a>
                            </li>
                            <li class="nav-item ml-auto">
                                <a class="nav-link" href="/gallery">{{ __('Gallery') }}</a>
                            </li> --}}

                            {{-- @if (Auth::user()->id === 1)
                                <li class="nav-item ml-auto">
                                    <a class="nav-link" href="{{ route('users') }}">{{ __('View Users') }}</a>
                                </li>
                            @endif 
                            --}}
                            <!-- end of added list -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ ucfirst(Auth::user()->user_name) }}
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
            @yield('content')
        </main>
    </div>
    @livewireScripts
</body>

</html>
