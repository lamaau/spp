<div>
    <button class="btn btn-info btn-export" data-toggle="modal" data-target="#download">
        <i class="far fa-arrow-left"></i>
    </button>

    <x-modals.modal-right wire:ignore.self>
        <form>
            <div class="form-group">
                <label>Status Siswa?</label>
                @foreach ($constants as $index => $item)
                    <div class="custom-control custom-checkbox mt-2">
                        <input type="checkbox" wire:model="statues" value="{{ $index }}" name="statues" class="custom-control-input" id="checkbox-{{$index}}">
                        <label class="custom-control-label" for="checkbox-{{$index}}">{{ $item }}</label>
                    </div>
                @endforeach
            </div>
            <button type="button" wire:click.prevent="download" class="btn btn-primary btn-block">
                Download
            </button>
        </form>
    </x-modals.modal-right>
</div>