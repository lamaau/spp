<div>
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
            <a class="dropdown-item" href="{{ route('master.student.setting-room') }}">Atur Kelas</a>
            <a class="dropdown-item" href="#" wire:click.prevent="downloadFormat">Download Format</a>
        </div>
    </div>

    <x-modals.import
        id="import-modal"
        title="Import Siswa"
        :file="$file"
        wire:model.defer='file'
    />

    @push('scripts')
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', () => {
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
            });

        </script>
    @endpush
</div>
