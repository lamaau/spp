@props(['name', 'label'])

<label for="{{ $name }}">{{ ucfirst($label) }}</label>
<input {{ $attributes->wire('model') }} id="{{ $name }}" type="{{ $name }}"
    class="form-control @error($name) is-invalid @enderror" name="{{ $name }}">

@error($name)
    <small class="mt-2 invalid-feedback">{{ $message }}</small>
@enderror
