<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @include('layouts.preloader')
        <div class="hfill d-md-block d-none">
        </div>


        @include('menus.mainmenu')
        <header class="header">
            <div class="container">
                <h1>
                    @yield('title')
                </h1>
            </div>
        </header>
        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>


        <footer>
        </footer>
    </div>
    @include('popups.popup-messages')
</body>

</html>
