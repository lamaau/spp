@component('mail::message')
    {{-- Greeting --}}
    Hallo {{ $user->name }}!

    Anda menerima email ini karena dokumen yang anda import tidak sesuai dengan format yang telah diberikan.
    Dokumen yang anda upload adalah {{ explode('/', $filename)[1] }}

    @lang('Regards'),
    {{ config('app.name') }}
@endcomponent
