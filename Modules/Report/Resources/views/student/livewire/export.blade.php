<div>
    <button class="btn btn-info btn-export" data-toggle="modal" data-target="#download">
        <i class="far fa-arrow-left"></i>
    </button>

    <x-modals.modal-right wire:ignore.self>
        <form>
            <div class="form-group custom-select-icon">
                <div wire:ignore>
                    <label>Kelas <small class="text-danger">*</small></label>
                    <select name="room" id="room" wire:model.lazy="room" class="form-control custom-select">
                        <option></option>
                        <option value="*">Semua</option>
                        @foreach ($rooms as $room)
                        <option value="{{$room->id}}">{{$room->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('room')
                    <small class="text-validate-error">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Status Siswa <small class="text-danger">*</small></label>
                @foreach ($constants as $index => $item)
                    <div class="custom-control custom-checkbox mt-2">
                        <input type="checkbox" wire:model.lazy="statues" value="{{ $index }}" name="statues" class="custom-control-input" id="checkbox-{{$index}}">
                        <label class="custom-control-label" for="checkbox-{{$index}}">{{ $item }}</label>
                    </div>
                @endforeach
                @error('statues')
                    <small class="text-validate-error">{{$message}}</small>
                @enderror
            </div>
            <button wire:target="download" wire:loading.attr="disabled" type="button" wire:click.prevent="download" class="btn btn-primary btn-block">
                <span wire:loading wire:target="download">Loading..</span>
                <span wire:loading.remove wire:target="download">Download</span>
            </button>
        </form>
    </x-modals.modal-right>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                customSelect('#room', {
                    allowClear: false,
                    placeholder: "",
                }, (e) => {
                    @this.set('room', e.target.value);
                });
            });
        </script>
    @endpush
</div>