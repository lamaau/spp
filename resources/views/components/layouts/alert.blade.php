@if ($type && $type === 'info')
    <div class="w-full p-5 mb-6 bg-blue-200 border-l-4 border-blue-500 rounded">
        <div class="flex space-x-3">
            <svg class="flex-none w-4 h-4 text-blue-500 fill-current" viewbox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-.001 5.75c.69 0 1.251.56 1.251 1.25s-.561 1.25-1.251 1.25-1.249-.56-1.249-1.25.559-1.25 1.249-1.25zm2.001 12.25h-4v-1c.484-.179 1-.201 1-.735v-4.467c0-.534-.516-.618-1-.797v-1h3v6.265c0 .535.517.558 1 .735v.999z">
                </path>
            </svg>
            <div class="flex-1 text-sm leading-tight text-blue-700">
                {{ $slot }}
            </div>
        </div>
    </div>
@endif

@if ($type && $type === 'success')
    <div class="w-full p-5 mb-6 bg-green-200 rounded">
        <div class="flex justify-between">
            <div class="flex space-x-3">
                <svg class="flex-none w-4 h-4 text-green-500 fill-current" viewbox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.25 16.518l-4.5-4.319 1.396-1.435 3.078 2.937 6.105-6.218 1.421 1.409-7.5 7.626z">
                    </path>
                </svg>
                <div class="flex-1 text-sm font-medium leading-tight text-green-700">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
@endif

@if ($type && $type === 'danger')
    <div class="w-full p-5 mb-6 bg-red-200 rounded">
        <div class="flex space-x-3">
            <svg class="flex-none w-4 h-4 text-red-500 fill-current" viewbox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z">
                </path>
            </svg>
            <div class="flex flex-col space-y-2 leading-tight">
                <div class="text-sm font-medium text-red-700">
                    {{ $label }}
                </div>
                <div class="flex-1 text-sm leading-snug text-red-600">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
@endif
