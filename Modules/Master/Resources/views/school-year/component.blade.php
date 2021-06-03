<div>
    <button wire:click.prevent="create" type="button" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Tambah
    </button>
    <div class="dropdown d-inline">
        <button class="btn btn-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog"></i> Lainnya
        </button>
        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#import-modal">
                Import Tahun ajaran
            </a>
            <a wire:click.prevent='downloadFormat' class="dropdown-item" href="#">
                Download Format
            </a>
        </div>
    </div>

    <x-modals.import
        id="import-modal"
        title="Import Tahun ajaran"
        :file="$file"
        wire:model.defer='file'
    />
    
    @php
        $title = is_null($pid) ? 'Tambah Tahun ajaran' : 'Ubah Tahun ajaran';
    @endphp

    <x-modals.modal id="createOrUpdate" :title="$title">
        <form>
            <x-slot name="body">
                <div class="form-group">
                    <x-inputs.text
                        required
                        label="tahun ajaran"
                        name="year"
                        wire:model.defer='year'
                    />
                </div>
                <div class="form-group">
                    <x-inputs.textarea
                        label="keterangan"
                        name="description"
                        wire:model.defer='description'
                    />
                </div>
            </x-slot>
            <x-slot name="footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">
                    Tutup
                </button>
                @if (is_null($pid))
                    <button wire:click.prevent='save' class="btn btn-primary">
                        Simpan
                    </button>
                @else
                    <button wire:click.prevent="update" class="btn btn-primary">
                        Ubah
                    </button>
                @endif
            </x-slot>
        </form>
    </x-modals.modal>

    @push('scripts')
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", () => {
                Livewire.on('import:complete', () => {
                    $('#import-modal').modal('hide');
                });

                Livewire.on('modal:toggle', () => {
                    $('#createOrUpdate').modal('toggle');
                });

                Livewire.on('delete', (id) => {
                    CustomDeleteSwall({
                        title: "Apakah anda yakin?",
                        message: "Semua data yang berhubungan dengan data ini akan dihapus",
                    }, (event) => {
                        if (event.isConfirmed) {
                            @this.call('delete', id, event.value);
                        }
                    });
                });
            });

        </script>
    @endpush
</div>