<h2 class="mb-4 text-xl font-semibold leading-tight text-gray-700">{{ $title }}</h2>
<div class="flex flex-col items-center sm:flex-row sm:justify-between">
    <div class="flex flex-col items-center mb-4 space-x-2 sm:flex-row md:mb-0">
        <div>
            <select wire:model='perPage'
                class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-gray-400 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                @foreach ($perPageOptions as $option)
                    <option>{{ $option }}</option>
                @endforeach
            </select>
        </div>
        <div class="relative block mt-2 sm:mt-0">
            <span class="absolute inset-y-0 left-0 flex items-center pl-2"><svg viewBox="0 0 24 24"
                    class="w-4 h-4 text-gray-500 fill-current">
                    <path
                        d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                    </path>
                </svg></span>
            <input placeholder="Search" type="search" name="search" wire:model.debounce.750ms='search'
                class="block w-full py-2 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-gray-400 rounded appearance-none focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
        </div>
    </div>
    <div class="space-x-1">
        @includeWhen($optionComponentEnabled, $optionComponentView)
    </div>
</div>
