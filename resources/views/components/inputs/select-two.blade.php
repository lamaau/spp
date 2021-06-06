<div class="@error($name) has-error @enderror">
    @if ($label)
        <label for="{{ $name }}" class="text-capitalize">{{ $label }}
            @if ($required)
                <small class="required text-danger">*</small>
            @endif
        </label>
    @endif
    <div class="custom-select-icon">
        <select id="{{ $name }}" {{ $attributes->wire('model') }} class="custom-select"
            name="{{ $name }}">
            <option></option>
            @if (!empty($items))
                @foreach ($items as $item)
                    <option value="{{ $item[$key] }}">
                        {{ $item[$text] }}
                    </option>
                @endforeach
            @endif
        </select>
    </div>
</div>
@error($name)
    <small style="color: #dc3545">{{ $message }}</small>
@enderror
