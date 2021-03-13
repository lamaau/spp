<div x-data="{{ $attributes['x-data'] }}" x-init="{{ $attributes['x-init'] }}">
    <div x-show="open" class="absolute top-0 right-0 w-2/3 m-3 md:w-1/3"
        x-transition:enter="transition transform ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition transform ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1"
        style="display: none;">
        <div class="flex items-start p-3 space-x-2 bg-white border border-gray-300 rounded-md shadow-lg">
            @if ($type === 'success')
                <svg class="flex-shrink-0 w-6 h-6 text-green-400" stroke="currentColor" viewBox="0 0 20 20">
                    <path stroke-width="1"
                        d="M10.219,1.688c-4.471,0-8.094,3.623-8.094,8.094s3.623,8.094,8.094,8.094s8.094-3.623,8.094-8.094S14.689,1.688,10.219,1.688 M10.219,17.022c-3.994,0-7.242-3.247-7.242-7.241c0-3.994,3.248-7.242,7.242-7.242c3.994,0,7.241,3.248,7.241,7.242C17.46,13.775,14.213,17.022,10.219,17.022 M15.099,7.03c-0.167-0.167-0.438-0.167-0.604,0.002L9.062,12.48l-2.269-2.277c-0.166-0.167-0.437-0.167-0.603,0c-0.166,0.166-0.168,0.437-0.002,0.603l2.573,2.578c0.079,0.08,0.188,0.125,0.3,0.125s0.222-0.045,0.303-0.125l5.736-5.751C15.268,7.466,15.265,7.196,15.099,7.03">
                    </path>
                </svg>
            @endif
            @if ($type === 'failed')
                <svg class="flex-shrink-0 w-6 h-6 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-alert-triangle">
                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                    </path>
                    <line x1="12" y1="9" x2="12" y2="13"></line>
                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>
            @endif
            <div class="flex-1 space-y-1">
                <p class="text-base font-medium leading-6 text-gray-700">{{ $title }}</p>
                <p class="text-sm leading-5 text-gray-600">{{ $description }}</p>
            </div>
            <svg class="flex-shrink-0 w-5 h-5 text-gray-400 cursor-pointer" x-on:click="open = false"
                stroke="currentColor" viewBox="0 0 20 20">
                <path stroke-width="1.2"
                    d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z">
                </path>
            </svg>
        </div>
    </div>
</div>
