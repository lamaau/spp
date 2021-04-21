@props(['label', 'name'])
<div>
    <x-inputs.label :text="$label" for="{{ $name }}" />
    <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}"
        class="w-full bg-white mt-1 rounded shadow @error($name) border border-red-500 @else border-none @enderror">
    @error($name)
        <x-inputs.error :message="$message" />
    @enderror
</div>
