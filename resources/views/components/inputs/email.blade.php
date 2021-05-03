@props(['name', 'label', 'required' => null])

<label for="{{ $name }}" class="text-capitalize">
    {{ $label }}

    @if ($required)
        <small class="required text-danger">*</small>
    @endif
</label>
<input {{ $attributes->wire('model') }} id="{{ $name }}" type="email"
    class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" value="{{ old($name) }}">

@error($name)
    <small class="invalid-feedback">{{ $message }}</small>
@enderror
