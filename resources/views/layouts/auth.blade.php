<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">
    @livewireStyles
    <!-- Scripts -->
    <script src="{{ url(mix('js/app.js')) }}" defer></script>
    <!-- CSRF Token -->
    @if ($title ?? false)
        <title>{{ config('app.name') }} - {{ $title }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
        @yield('content')
    </div>
    @livewireScripts
</body>

</html>
