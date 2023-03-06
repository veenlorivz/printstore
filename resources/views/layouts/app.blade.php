<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PrintStore') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Style -->
    @yield('style')
</head>
<body>
    <div id="app" style="min-height: 100%; max-width: 95%">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="width: 100vw;">
            <div class="container">
                @if (!Request::is('dashboard/*'))
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'PrintStore') }}
                </a>
                @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if (Auth::check() && !Request::is('dashboard/*'))
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('register') }}">Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('cart') ? 'active' : '' }}" href="{{ route('cart') }}">Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::is('orders.index') ? 'active' : '' }}" href="{{ route('orders.index') }}">Orders</a>
                            </li>
                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->role == 'admin')
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                       User Page
                                    </a>
                                    <a class="dropdown-item" href="{{ route('dashboard.products') }}">
                                       Dashboard
                                    </a>
                                    @endif
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

        <main class="py-4 px-5">
            @yield('content')
        </main>
    </div>
</body>
</html>
