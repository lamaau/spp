<div>
    <label for="{{ $name }}" class="text-capitalize">
        {{ $label }}

        @if ($required)
            <small class="required text-danger">*</small>
        @endif
    </label>
    <textarea {{ $attributes->wire('model') }} name="{{ $name }}" id="{{ $name }}"
        class="form-control @error($name) is-invalid @enderror" style="min-height: 5em;"></textarea>

    @error($name)
        <small class="invalid-feedback mt-0">{{ $message }}</small>
    @enderror
</div>
