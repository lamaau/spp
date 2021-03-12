<x-base-layout :title="$title ?? ''">
    @if ($css ?? false)
        {{ $css }}
    @endif

    {{ $slot }}

    @if ($javascript ?? false)
        {{ $javascript }}
    @endif
</x-base-layout>
