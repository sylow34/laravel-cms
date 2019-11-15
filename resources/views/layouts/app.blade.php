<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" sizes="196x196" href="/admin_assets/images/logo.png">

    <link rel="stylesheet" href="/admin_assets/libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/admin_assets/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="/admin_assets/libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="/admin_assets/css/bootstrap.css">
    <link rel="stylesheet" href="/admin_assets/css/core.css">
    <link rel="stylesheet" href="/admin_assets/css/misc-pages.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="simple-page">

            @yield('content')

</body>
</html>
