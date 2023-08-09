<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name='description' content='@yield('meta_keyword')'>
    <meta name='keywords' content='@yield('meta_description')'>
    <meta name='author' content='Kibooli Felix'>

    <!-- Fonts -->
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/navbar.css')}}" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/bootstrap.min.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div id="app">
        @include('layouts.inc.admin.home.navbar')
        <main>
            @yield('content')
        </main>
        <!---Scripts-->
        @vite(['resources/js/jquery-3.7.0.min.js','resources/js/bootstrap.bundle.min.js'])
    </div>
     @livewireScripts
</body>
</html>
