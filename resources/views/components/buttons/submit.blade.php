@props(['xAction', 'xShow', 'xLoading', 'xText'])

<button x-show="{{ $xShow }}" x-on:click="{{ $xAction }}" type="button"
    class="flex items-center justify-center w-full py-3 text-sm text-center text-white bg-indigo-600 rounded shadow focus:outline-none focus:ring-2 hover:bg-indigo-700">
    <span x-show="!{{ $xLoading }}">{{ $xText }}</span>
    <x-icons.loading class="w-5" stroke="white" x-show="{{ $xLoading }}" />
</button>
