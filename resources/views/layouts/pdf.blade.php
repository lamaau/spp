<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $title ?? 'Document' }}</title>
    @include('layouts.includes.pdf.style')
    @stack('styles')
</head>

<body>
    @includeWhen($cop ?? false, 'layouts.includes.pdf.cop')

    @yield('content')

    @includeWhen($ttd ?? false, 'layouts.includes.pdf.ttd')

    @stack('scripts')
</body>

</html>
