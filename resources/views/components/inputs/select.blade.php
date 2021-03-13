<label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
    {{ $attributes['select-label'] }}
</label>
<button x-on:click="{{ $attributes['select-state'] }}" type="button"
    class="{{ $attributes['class'] ?? '' }} relative w-full px-4 py-3 text-left transition duration-150 ease-in-out bg-white border rounded appearance-none cursor-default focus:outline-none">
    <div class="flex items-center space-x-3">
        <span x-text="{{ $attributes['select-value'] }}"></span>
    </div>
    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
        @if ($selectLoadingState = $attributes['select-loading-state'])
            <x-icons.loading x-show="{{ $selectLoadingState }}" style="display:none;" />
            <x-icons.select x-show="!{{ $selectLoadingState }}" style="display:none;" />
        @endif
    </span>
</button>
<input type="hidden" x-ref="{{ $attributes['select-name'] }}" name="{{ $attributes['select-name'] }}"
    style="display: hidden;">
<div class="relative z-50">
    <div x-show="{{ $attributes['select-container-state'] }}"
        x-on:click.away="{{ $attributes['select-container-click-away'] }}"
        class="absolute w-full mt-1 overflow-auto rounded shadow select-container max-h-56" style="display: none;"
        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <ul class="bg-gray-100 rounded">
            {{ $slot }}
        </ul>
    </div>
</div>
