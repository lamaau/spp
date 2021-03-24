@props(['label', 'error', 'xModel', 'type' => 'text'])

<div class="mb-3">
    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
        {{ $label }}
    </label>

    <input autocomplete="off" x-model="{{ $xModel }}"
        class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker"
        x-bind:class="{'border-red-600' : {{ $error }}}" name="{{ $xModel }}" type="{{ $type }}">
    <p class="text-xs italic text-red-600" x-show="{{ $error }}" x-text="{{ $error }}"></p>
    </input>
</div>
