<form class="form-inline">
    <div class="form-group">
        <select class="custom-select" style="width: 100px;" id="room-1" wire:model='room'>
            <option selected>Kelas</option>
            @foreach ($rooms as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary ml-2" wire:click.prevent='up' style="padding: 8px 15px;"
            {{ empty($checkbox_values) ? 'disabled' : '' }}>
            <i class="fas fa-arrow-right"></i>
        </button>
    </div>
</form>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(() => {
            $("#room-1").on("change", (e) => {
                @this.call('resetCheckbox');
                @this.set('room', e.target.value);
            });
        });

    </script>
@endpush
