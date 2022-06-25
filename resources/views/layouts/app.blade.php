<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CrossMoon') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{asset('js/sidebar.js')}}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{asset('css/sidebar.css')}}" rel="stylesheet">
        <link href="{{asset('css/header.css')}}" rel="stylesheet">

        <!-- Icons -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        @component('components.header')
        @endcomponent
        <main id="main" style="
                {{\Illuminate\Support\Facades\Auth::user() ? 'grid-template-areas: "sidebar main"; grid-template-columns: 200px 1fr;' : ''}}">
            @if(\Illuminate\Support\Facades\Auth::user())
                @component('components.sidebar')
                @endcomponent
            @endif
            @yield('content')
        </main>
{{--        @component('components.footer')--}}
{{--        @endcomponent--}}
    </body>
</html>
