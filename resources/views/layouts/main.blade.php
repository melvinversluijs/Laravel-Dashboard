<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>{{ config('app.name', 'Laravel') }} @yield('title-suffix')</title>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div id="app">
    <nav class="border-b border-gray-400 py-2">
        <div class="container flex justify-between items-center">
            <div class="ml-8">
                <a href="{{ url('/') }}" class="font-bold text-xl hover:text-green-400">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="mr-8">
                <ul class="flex">
                    <!-- Authentication Links -->
                    @guest
                        <li class="pr-2">
                            <a href="{{ route('login') }}" class="hover:text-green-400">
                                {{ __('Login') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="hover:text-green-400">
                                {{ __('Register') }}
                            </a>
                        </li>
                    @else
                        <li>
                            <a>{{ Auth::user()->name }}</a>
                            <a
                                href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</div>
</body>
</html>
