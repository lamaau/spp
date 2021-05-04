@props([
    'name',
    'data',
    'id' => null,
    'label' => null,
    'text' => null,
    'value' => null,
    'key' => null,
    'required' => false
])

<div class="@error($name) has-error @enderror">
    @if ($label)
        <label for="{{ $id ?? $name }}" class="text-capitalize text-dark">
            {{ $label }}
        
            @if ($required)
                <small class="required text-danger">*</small>
            @endif
        </label>
    @endif
    <select wire:ignore class="form-control select2 @error($name) is-invalid-select2 @enderror" name="{{ $name }}" id="{{ $id ?? $name }}">
        <option></option>
        @foreach ($data as $item)
            <option value="{{ $item->$key }}" {{old($name, $value) == $item->$key  ? 'selected' : ''}}>{{ $item->$text }}</option>
        @endforeach
    </select>
</div>

@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2({
                placeholder: "",
            });
        });

        document.addEventListener('DOMContentLoaded', () => {               
            Livewire.hook('message.processed', (message, component) => {
                $(".select2").select2({
                    placeholder: "",
                });
            });
        });

    </script>
@endpush
