<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div id="app">
        <app-header
        url-welcome="{{route('welcome')}}"
        url-home="{{route('home')}}"
        url-assignments="{{route('assignment.index')}}"
        is-authenticated="{{auth()->check() ? : 0}}"
        url-login="{{route('login')}}"
        url-register="{{route('register')}}"
        user-name="{{auth()->user()->name ?? 'User'}}"
        url-logout="{{route('logout')}}"
        csrf-token="{{csrf_token()}}"
        src-logo="{{asset('img/logo.png')}}">
        </app-header>

        <main class="py-4">
            @yield('content')
        </main>

        <app-footer></app-footer>
    </div>
</body>
</html>
