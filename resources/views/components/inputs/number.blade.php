<label for="{{ $name }}" class="text-capitalize">
    {{ $label }}

    @if ($required)
        <small class="required text-danger">*</small>
    @endif
</label>
<input {{ $attributes->wire('model') }} id="{{ $name }}" type="text"
    class="form-control number @error($name) is-invalid @enderror" name="{{ $name }}">

@error($name)
    <small class="invalid-feedback">{!! $message !!}</small>
@enderror
