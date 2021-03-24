<x-app-layout :title="$title">
    <h1 class="text-5xl font-extrabold tracking-wider text-center text-gray-600">
        {{request()->path()}}
    </h1>
</x-app-layout>
