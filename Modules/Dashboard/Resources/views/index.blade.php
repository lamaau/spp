<x-app-layout :title="$title">
    {{ $setting->name }}
    <ul class="list-disc">
        @foreach ($rooms as $room)
            <li>{{ $room->name }} | {{ $room->description }}</li>
        @endforeach
    </ul>
</x-app-layout>
