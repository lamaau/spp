<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }} &mdash; Stisla</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {!! Livewire::styles() !!}
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    @stack('styles')
</head>

<body>

    @yield('content')

    {!! Livewire::scripts() !!}
    @stack('scripts')
</body>

</html>
