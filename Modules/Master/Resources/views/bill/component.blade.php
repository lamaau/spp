<div>
    <button type="button" data-target="create" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i>
    </button>
    <div class="dropdown d-inline mr-2">
        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#import">Import</a>
            <a class="dropdown-item" href="#">Download PDF</a>
            <a class="dropdown-item" href="#">Download Excel</a>
            <a class="dropdown-item" href="#">Download Format</a>
        </div>
    </div>

    <x-modals.modal id="createOrUpdate" :title="$title">
        <form>
            <x-slot name="body">
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="name"
                        label="nama"
                        wire:model.lazy='name'
                    />
                </div>
                <div class="form-group">
                    <x-inputs.number
                        required
                        name="nominal"
                        label="nominal"
                        wire:model.lazy='nominal'
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
                        wire:model.lazy='description'
                    />
                </div>
            </x-slot>
            <x-slot name="footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                @if ($state)
                    <button type="button" wire:click.prevent='save' class="btn btn-primary">Simpan</button>
                @else
                    <button type="button" wire:click.prevent='update' class="btn btn-primary">Ubah</button>
                @endif
            </x-slot>
        </form>
    </x-modals.modal>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(() => {
            $('button[data-target="create"]').on('click', () => {
                @this.call('create');
            });

            $('button[data-target="edit"]').on('click', (e) => {
                @this.call('edit', e.currentTarget.getAttribute('data-id'));
            });

            $(".select2").on("change", (e) => {
                @this.set('school_year_id', e.target.value);
            });
            
            $('.btn-delete').on('click', (e) => {
                swal({
                    title: 'Hapus data master?',
                    text: 'Semua data yang berhubungan dengan data ini akan dihapus!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        @this.call('delete', e.currentTarget.getAttribute('data-id'));
                    }
                });
            });

            Livewire.on('notify', () => {
                $('#createOrUpdate').modal('hide');
            });

            Livewire.on("modal-toggle", () => {
                $('#createOrUpdate').modal('toggle');
            });
        });

    </script>
@endpush
