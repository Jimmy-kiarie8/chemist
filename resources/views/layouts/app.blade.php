<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet"> {{--
    <link href="{{ asset('template/css/core-style.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet"> --}}
</head>

<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>

    <script>
        new WOW().init();
    </script>
    {{--
    <script src="{{ asset('template/js/jquery.js') }}" defer></script>
    <script src="{{ asset('template/js/popper.js') }}" defer></script>
    <script src="{{ asset('template/js/classy.js') }}" defer></script>
    <script src="{{ asset('template/js/active.js') }}" defer></script>
    <script src="{{ asset('template/js/plugins.js') }}" defer></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
      
        gtag('config', 'UA-23581568-13');
    </script> --}}

</body>

</html>