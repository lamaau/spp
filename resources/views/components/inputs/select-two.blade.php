<label for="{{ $name }}" class="text-capitalize">{{ $label }}
    @if ($required)
        <small class="required text-danger">*</small>
    @endif
</label>
<div class="custom-select-icon @error($name) has-error @enderror">
    <div>
        <select id="{{ $name }}" wire:model='{{ $name }}' class="custom-select"
            name="{{ $name }}">
            <option></option>
            @if (!empty($items))
                @foreach ($items as $item)
                    <option value="{{ $item[$key] }}">{{ $item[$text] }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
@error($name)
    <small class="text-validate-error">{{ $message }}</small>
@enderror
