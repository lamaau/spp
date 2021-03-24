<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if ($title ?? false)
        <title>{{ config('app.name') }} - {{ $title }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if ($css ?? false)
        {{ $css }}
    @endif
</head>

<body>
    <x-layouts.notify />

    <div class="flex h-screen bg-gray-200 font-roboto">
        <x-layouts.sidebar />
        <div class="flex flex-col flex-1 overflow-hidden">
            <x-layouts.header />
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="px-6 py-8 mx-auto">

                    @if ($unpaid && request()->path() !== 'invoice')
                        <x-layouts.alert type="info">
                            Klik <a href="{{ route('invoice.index') }}" class="border-b-2 border-blue-300">disini</a> untuk lihat tagihan anda, segera selesaikan pembayaran sebelum hari {{ \Carbon\Carbon::now()->addDays()->isoFormat('dddd, D MMMM Y') }}
                        </x-layouts.alert>
                    @endif
                    
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    @livewireScripts
</body>

</html>
