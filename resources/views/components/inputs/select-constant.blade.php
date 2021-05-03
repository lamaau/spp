@props([
    'label',
    'name',
    'data',
    'value' => null,
    'required' => false
])

<label for="{{ $name }}" class="text-capitalize">
    {{ $label }}

    @if ($required)
        <small class="required text-danger">*</small>
    @endif
</label>
<select class="form-control select2 @error($name) is-invalid-select2 @enderror" name="{{ $name }}" id="{{ $name }}">
    <option></option>
    @foreach ($data as $key => $item)
        <option value="{{ $key }}" {{old($name, $value) == $key ? 'selected' : ''}}>{{ $item }}</option>
    @endforeach
</select>

@error($name)
    <small class="text-danger">{{ $message }}</small>
@enderror

@push('scripts')
    <script type="text/javascript">
        if (jQuery().select2) {
            $(".select2").select2({
                placeholder: "",
            });
        } else {
            console.warn("select2 is not loaded");
        }

    </script>
@endpush
