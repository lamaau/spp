@props(['name', 'label', 'id' => null, 'class' => null, 'value' => null, 'required' => null])

<label for="{{ $id ?? $name }}" class="text-capitalize">
    {{ $label }}

    @if ($required)
        <small class="required text-danger">*</small>
    @endif
</label>
<input {{ $attributes->wire('model') }} id="{{ $id ?? $name }}" type="text"
    class="{{ $class }} form-control @error($name) is-invalid @enderror" name="{{ $name }}"
    value="{{ old($name, $value) }}" {{ $attributes }}>

@error($name)
    <small class="invalid-feedback">{{ $message }}</small>
@enderror
