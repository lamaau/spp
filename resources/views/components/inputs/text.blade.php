@props(['label', 'name'])

<div>
    <label class="block mt-2 mb-1 text-xs font-bold uppercase" for="{{ $name }}">{{ $label }}</label>
    <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}"
        class="w-full bg-white mt-1 rounded shadow @error($name) border border-red-500 @else border-none @enderror"
        {{ $attributes }}>

    @error($name)
        <x-inputs.error :message="$message" />
    @enderror
</div>
