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
    @include('layouts.preloader')
    <div class="hfill d-md-block d-none">
    </div>
    <div id="app">
        @include('menus.mainmenu')
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5 col-sm-12">
                    <aside class="p-0">
                        @yield('sidebar')
                    </aside>
                </div>
                <div class="col-lg-9 col-md-7 col-sm-12">
                    <main class="p-0">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
