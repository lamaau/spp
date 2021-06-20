<div>
    <div class="card-header-action">
        <a href="{{ route('master.student.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah
        </a>
        <div class="dropdown d-inline mr-2">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cog"></i> Lainnya
            </button>
            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start">
                <a class="dropdown-item" data-toggle="modal" data-target="#import-modal" href="#">Import Siswa</a>
                <a class="dropdown-item" href="{{ route('master.student.setting-status') }}">Kelola Status</a>
                <a class="dropdown-item" href="{{ route('master.student.setting-room') }}">Kelola Kenaikan Kelas</a>
                <a class="dropdown-item" href="#" wire:click.prevent="downloadFormat">Download Format</a>
            </div>
        </div>
    </div>

    <x-modals.import id="import-modal" title="Import Siswa" :file="$file" wire:model.defer='file' />
    <x-modals.modal title="Ubah status siswa" id="student-status">
        <x-slot name="body">
            <div class="form-group">
                <x-inputs.select-constant
                    required
                    label="Pilih Status"
                    name="status"
                    :items="$items"
                    wire:model="status"
                />
            </div>
        </x-slot>
        <x-slot name="footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">
                Tutup
            </button>
            <button wire:click.prevent='update' class="btn btn-primary">
                Simpan
            </button>
        </x-slot>
    </x-modals.modal>

    @push('styles')
        <style type="text/css">
            .note-editor.note-frame {
                border: 1px solid #e4e6fc;
            }

        </style>
    @endpush

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                Livewire.on('modal:toggle', () => {
                    $('#student-status').modal('toggle');
                });

                Livewire.on('notify', () => {
                    $('#student-status').modal('hide');
                });

                customSelect('#filter', {
                    allowClear: false,
                    placeholder: "",
                }, (e) => {
                    @this.set('filter', e.target.value);
                });

                Livewire.on('import:complete', (id) => {
                    $('#import-modal').modal('toggle');
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

                Livewire.hook('message.processed', (component, message) => {
                    customSelect('#status', {
                        allowClear: false,
                        placeholder: "",
                    }, (e) => {
                        @this.set('status', e.target.value);
                    });
                });
            });

        </script>
    @endpush
</div>
