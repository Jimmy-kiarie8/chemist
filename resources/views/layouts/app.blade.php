<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/png" href="/storage/icons/favicon.png" />
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slide.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet"> 
    <link href="{{ asset('mdBootstrap/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('mdBootstrap/css/mdb.css') }}" rel="stylesheet">
    <link href="{{ asset('mdBootstrap/css/mdb.lite.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('template/css/style.css') }}" rel="stylesheet"> --}}


</head>

<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="{{ asset('js/wow.js') }}"></script> --}}
    <script src="{{ asset('mdBootstrap/js/mdb.min.js') }}" defer></script>


</body>

</html>