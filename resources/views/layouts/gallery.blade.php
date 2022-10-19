<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Image Gallery</title>

    <!-- Latest compiled and minified CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
    <!-- References: https://github.com/fancyapps/fancyBox -->

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="https://www.google.com/recaptcha/api.js?" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- light gallery js library --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/lightgallery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <style type="text/css">
        div.gallery {
            margin: 5px;
            border: 1px solid #ccc;
            float: left;
            width: 180px;
        }

        div.gallery:hover {
            border: 1px solid #777;
        }

        div.gallery img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }
    </style>
    @livewireStyles
</head>

<body style="background: url('/img/bg.jpg')">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
<li>....</li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item ml-auto">
                            <a class="nav-link" href="/welcome">{{ __('Home') }}</a>
                        </li>
                        @guest
                        @else
                            <!-- added list -->
                            <li class="nav-item ml-auto">
                                <a class="nav-link" href="/welcome">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item ml-auto">
                                <a class="nav-link" href="/services">{{ __('Services') }}</a>
                            </li>
                            @if (Auth::user()->role == 1)
                                <li class="nav-item ml-auto">
                                    <a class="nav-link" href="/admin/gallery">{{ __('Admin Gallery') }}</a>
                                </li>
                            @endif
                            @if (!Auth::user()->role == 1)
                                <li class="nav-item ml-auto">
                                    <a class="nav-link" href="/gallery">{{ __('Gallery') }}</a>
                                </li>
                            @endif
                            <li class="nav-item ml-auto">
                                <a class="nav-link" href="/aboutus">{{ __('About Us') }}</a>
                            </li>
                            @if (Auth::user())
                                <li class="nav-item ml-auto">
                                    <a class="nav-link" href="/pet">{{ __('My Pets') }}</a>
                                </li>
                            @endif
                            @if (Auth::user() && Auth::user()->role == 1)
                            <li class="nav-item ml-auto">
                                <a class="nav-link" href="/appointment">{{ __('Appointments') }}</a>
                            </li>
                            @endif
                            {{-- create another link here for the admin view of appointment --}}
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

    @yield('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
        });

        $('.alert').delay(500).fadeOut(500);
    </script>
    @livewireScripts
</body>

</html>
