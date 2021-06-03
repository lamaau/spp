<div>
    <button type="button" wire:click.prevent="create" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Tambah
    </button>
    <div class="dropdown d-inline mr-2">
        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog"></i> Lainnya
        </button>
        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#import-modal">Import Tagihan</a>
            <a class="dropdown-item" href="#" wire:click.prevent="downloadFormat">Download Format</a>
        </div>
    </div>

    <x-modals.import class="import"
        id="import-modal"
        title="Import Tagihan"
        :file="$file"
        wire:model='file'
    />
    
    @php
        $title = is_null($pid) ? 'Tambah Tagihan' : 'Ubah tagihan';
    @endphp
    
    <x-modals.modal id="createOrUpdate" :title="$title">
        <form>
            <x-slot name="body">
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="name"
                        label="nama"
                        wire:model.defer='name'
                    />
                </div>
                <div class="form-group">
                    <x-inputs.number
                        required
                        name="nominal"
                        label="nominal"
                        wire:model.defer='nominal'
                    />
                </div>
                <div class="form-group">
                    <div class="control-label">Bulanan?</div>
                    <label class="custom-switch mt-2 pl-0">
                        <input type="checkbox" name="monthly" wire:model='monthly' class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Pembayaran dilakukan tiap bulan</span>
                    </label>
                </div>
                <div class="form-group">
                    <x-inputs.textarea
                        name="description"
                        label="keterangan"
                        wire:model.defer='description'
                    />
                </div>
            </x-slot>
            <x-slot name="footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
</div>

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
