<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="VinExplore">
    <link rel="icon" href="/img/icons/appmetalogo.svg" type="image/svg">

    <title>{{ config('app.name') }} - @yield('title')</title>
    <!-- Styles -->
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="VinExplore">
    <link rel="icon" href="/img/icons/appmetalogo.svg" type="image/svg">

    <title>{{ config('app.name') }} - @yield('title')</title>
    <!-- Styles -->
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="login_logo_form">
            <h1>VinExplore</h1>
        </div>
        <main>
            @yield('content')
        </main>

    </div>
</body>

</html>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="login_logo_form">
            <h1>VinExplore</h1>
        </div>
        <main>
            @yield('content')
        </main>

    </div>
</body>

</html>
