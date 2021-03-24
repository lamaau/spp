@props(['x-action-text', 'x-close-text', 'x-close', 'x-show', 'x-title', 'x-description', 'x-loading', 'x-action'])

<x-layouts.modal x-close="{{ $xClose }}" x-show="{{ $xShow }}">
    <div class="items-center md:flex">
        <div
            class="flex items-center justify-center flex-shrink-0 w-16 h-16 mx-auto border border-gray-300 rounded-full">
            <x-icons.danger class="w-8 text-red-500" />
        </div>
        <div class="mt-4 text-center md:mt-0 md:ml-6 md:text-left">
            <p class="font-bold">{{ $xTitle }}</p>
            <p class="mt-1 text-sm text-gray-700">{{ $xDescription }}</p>
        </div>
    </div>
    <div class="mt-4 text-center md:text-right md:flex md:justify-end">
        <button x-on:click="{{ $xAction }}"
            class="flex items-center justify-center w-full px-4 py-3 text-sm font-semibold text-red-700 bg-red-200 rounded-lg focus:outline-none focus:ring-2 md:inline-block md:w-auto md:py-2 md:ml-2 md:order-2">
            <span x-show="!{{ $xLoading }}">{{ $xActionText ?? 'Hapus' }}</span>
            <x-icons.loading class="w-5" stroke="white" x-show="{{ $xLoading }}" />
        </button>
        <button x-on:click="{{ $xClose }}"
            class="block w-full px-4 py-3 mt-4 text-sm font-semibold bg-gray-200 rounded-lg md:inline-block md:w-auto focus:outline-none focus:ring-2 md:py-2 md:mt-0 md:order-1">{{ $xCloseText ?? 'Batal' }}</button>
    </div>
</x-layouts.modal>
