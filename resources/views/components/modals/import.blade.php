<x-modals.modal :title="$title" :id="$id">
    <form>
        <x-slot name="body">
            <div class="form-group mb-0">
                <label for="file" class="input-file mb-0 text-center @error('file') input-file-error @enderror">
                    <div>
                        @if (is_null($file))
                            <i class="fas fa-upload input-file-icon"></i>
                        @else
                            <i class="fas fa-file-excel input-file-icon"></i>
                        @endif
                    </div>

                    @if (is_null($file))
                        <span>Upload Dokumen</span>
                    @else
                        <span>{{ $file->getClientOriginalName() }}</span>
                    @endif
                </label>

                <input type="file" id="file"
                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                    class="form-control" name="file" {{ $attributes->wire('model') }} style="display: none;">
                @error('file')
                    <span class="text-danger text-left font-italic">{{ $message }}</span>
                @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-danger" {{ is_null($file) ? 'disabled' : '' }}
                wire:click.prevent='removeFileImport'>Hapus</button>
            <button wire:click.prevent='upload' class="btn btn-primary"
                {{ is_null($file) ? 'disabled' : '' }}>Upload</button>
        </x-slot>
    </form>
</x-modals.modal>
