@props(['label', 'error', 'xRef', 'xState', 'xModel', 'xOptions', 'type' => 'text'])

<div class="relative mb-3">
    <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
        {{ $label }}
    </label>
    <input type="hidden" x-ref="{{ $xRef }}">
    <input autocomplete="off" x-model.debounce.500="{{ $xModel }}" x-on:click="{{ $xState }} = !{{ $xState }}"
        class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker"
        x-bind:class="{'border-red-600' : {{ $error }}}" name="{{ $xModel }}" type="{{ $type }}">
        <p class="text-xs italic text-red-600" x-show="{{ $error }}" x-text="{{ $error }}"></p>
    </input>
    <ul x-show="{{ $xState }}" x-on:click.away="{{ $xState }} = false" class="absolute w-full overflow-auto bg-gray-200 rounded-b max-h-36 scroll-component">
        <template x-for="(option, index) in {{ $xOptions }}" x-key="index">
            <li x-on:click="choose(option)" class="p-2 hover:bg-gray-300">
                <span x-text="option.name"></span> - <span x-text="option.description"></span>
            </li>
        </template>
    </ul>
</div>
