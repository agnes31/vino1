<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- Styles -->
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/auth.css" rel="stylesheet">
    <link href="/css/components/nav.css" rel="stylesheet">

</head>

<body class="">
    <!-- Header -->
    <header>
        <img src="{{ asset('img/logo-site.png') }}" alt="Grappe de raisin-Icône" class="site-logo_header">

        <h2>VinExplore</h2>

    </header>
    <nav class="navi">
        <input type="checkbox">
        <div>
            <a class="" href="{{route('cellars.index')}}"><span class="mdi mdi-liquor"></span>Celliers</a>
            <a class="" href="{{route('bottles.list')}}"><span class="mdi mdi-magnify"></span>Recherche</a>
            <a href="{{ route('logout') }}"><span class="mdi mdi-logout"></span>Déconnexion</a>
        </div>
    </nav>
    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <script src="/js/modale.js"></script>

</body>

</html>