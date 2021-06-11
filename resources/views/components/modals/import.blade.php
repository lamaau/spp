<x-modals.modal :title="$title" :id="$id">
    <form>
        <x-slot name="body">
            <div class="form-group mb-0">
                <label for="file" class="input-file mb-0 text-center @error('file') input-file-error @enderror">
                    <div>
                        @if (is_null($file))
                            <i class="fad fa-upload input-file-icon"></i>
                        @else
                            <i class="fad fa-file-excel input-file-icon"></i>
                        @endif
                    </div>

                    @if (is_null($file))
                        <span>Upload Dokumen</span>
                    @else
                        <span>{{ $file->getClientOriginalName() }}</span>
                    @endif
                </label>

                <input type="file" id="file"
                    accept="application/excel, application/vnd.ms-excel, application/x-excel, application/x-msexcel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                    class="form-control" name="file" {{ $attributes->wire('model') }} style="display: none;">
                @error('file')
                    <span class="text-danger text-left font-italic">{{ ucfirst($message) }}</span>
                @enderror

                <x-progress id="student" class="mt-2" max="100" />
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
