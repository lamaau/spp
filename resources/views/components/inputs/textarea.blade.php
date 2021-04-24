@props(['name', 'label'])

<div>
    <label class="block mt-2 mb-1 text-xs font-bold uppercase" for="{{ $name }}">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $name }}"
        class="w-full mt-1 -mb-1 rounded shadow @error($name) border border-red-500 @else border-none @enderror"
        {{ $attributes }}></textarea>
    @error($name)
        <x-inputs.error :message="$message" />
    @enderror
</div>
