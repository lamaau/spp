@props([
    'name',
    'label',
    'value' => null,
    'required' => null
])

<label for="{{ $name }}" class="text-capitalize">
    {{ $label }}

    @if ($required)
        <small class="required text-danger">*</small>
    @endif
</label>
<textarea {{ $attributes->wire('model') }} name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" style="height: 5em;">{{ old($name, $value) }}</textarea>

@error($name)
    <small class="invalid-feedback">{{ $message }}</small>
@enderror
