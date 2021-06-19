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
            <div class="form-group">
                <label>Kelompokan berdasarkan sheet?</label>
                <div class="custom-control custom-radio mt-2">
                    <input type="radio" id="sheetYes" wire:model="sheet" value="1" name="sheet" class="custom-control-input">
                    <label class="custom-control-label" for="sheetYes">Ya, bagi siswa berdasarkan sheet</label>
                </div>
                <div class="custom-control custom-radio mt-2">
                    <input type="radio" id="sheetNo" wire:model="sheet" value="0" name="sheet" class="custom-control-input">
                    <label class="custom-control-label" for="sheetNo">Tidak, semua siswa didalam satu sheet</label>
                </div>
            </div>
            <button type="button" wire:click.prevent="download" class="btn btn-primary btn-block">
                Download
            </button>
        </form>
    </x-modals.modal-right>
</div>