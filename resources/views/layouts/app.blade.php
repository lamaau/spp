<x-base-layout :title="$title">
    @if ($css ?? false)
        {{ $css }}
    @endif
    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-200 sm:px-6 lg:px-8">
        {{ $slot }}
    </div>
    @if ($javascript ?? false)
        {{ $javascript }}
    @endif
</x-base-layout>