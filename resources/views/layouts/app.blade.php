<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ $title }} &mdash; Stisla</title>

    @include('layouts.includes.styles')
</head>

<body>

    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            @include('layouts.includes.navbar')

            @include('layouts.includes.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                {{ $slot }}
            </div>

            @include('layouts.includes.footer')
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    @include('layouts.includes.scripts')
</body>

</html>
