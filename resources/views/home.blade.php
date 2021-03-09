@extends('layouts.app')

@section('content')
<div class="flex items-center h-screen justify-center">
    <div class="flex flex-col justify-around">
        <div class="space-y-6">
            <a href="{{ route('home') }}">
                <x-logo class="w-auto h-16 mx-auto text-indigo-600">
                </x-logo>
            </a>
            <h1 class="text-5xl font-extrabold tracking-wider text-center text-gray-600">
                This is home page
            </h1>
        </div>
    </div>
</div>
@endsection
