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
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            if (jQuery().select2) {
                $(".select2").select2({
                    placeholder: "",
                });
            } else {
                console.warn("select2 is not loaded");
            }
        });

    </script>
@endpush
