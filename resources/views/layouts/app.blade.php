<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dashboard') }}</title>

    <!-- Styles -->
    @yield('styles')
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"
        integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">

    @yield('header-scripts')
</head>

<body>
    <div id="app">
        <header class="header">
            <div class="container">
                <a class="brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Dashboard') }}
                </a>

                <nav class="navbar">
                    <ul class="navbar-list">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="form form-logout">
                                @csrf
                                <button type="submit" class="btn btn-logout">{{ __('Logout') }}</button>
                            </form>
                        </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </header>

        <main class="content">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    @yield('footer-scripts')
    <script src="{{ mix('/js/app.js') }}" defer></script>
</body>

</html>