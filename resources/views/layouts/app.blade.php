<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/template.css') }}">
    {{-- if using pro, disable font awesome --}}
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    {!! Livewire::styles() !!}
    @include('layouts.includes.styles')
    @stack('styles')
</head>

<body>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            @include('layouts.includes.navbar')

            @include('layouts.includes.sidebar')

            <!-- Start Main Content -->
            <div class="main-content">
                {{ $slot }}
            </div>
            <!-- End Main Content -->

            @include('layouts.includes.footer')
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    {!! Livewire::scripts() !!}
    @include('layouts.includes.scripts')
    @stack('scripts')
</body>

</html>
