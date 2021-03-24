@props(['label', 'error', 'xModel'])

<div class="mb-3">
    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
        {{ $label }}
    </label>
    <textarea x-model="{{ $xModel }}"
        class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker"
        x-bind:class="{'border-red-600' : {{ $error }}}" name="{{ $xModel }}"></textarea>
    <p class="text-xs italic text-red-600" x-show="{{ $error }}" x-text="{{ $error }}"></p>
</div>
