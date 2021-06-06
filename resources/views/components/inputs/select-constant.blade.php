@if ($label)
    <label for="{{ $name }}" class="text-capitalize">{{ $label }}
        @if ($required)
            <small class="required text-danger">*</small>
        @endif
    </label>
@endif
<div class="custom-select-icon @error($name) has-error @enderror">
    <div wire:ignore>
        <select id="{{ $name }}" {{ $attributes->wire('model') }} class="custom-select"
            name="{{ $name }}" {{ $attributes }}>
            <option></option>
            @foreach ($items as $key => $item)
                <option value="{{ $key }}" {{ old($name, $value) == $key ? 'selected' : '' }}>
                    {{ $item }}
                </option>
            @endforeach
        </select>
    </div>
</div>
@error($name)
    <small style="color: #dc3545">{{ $message }}</small>
@enderror
