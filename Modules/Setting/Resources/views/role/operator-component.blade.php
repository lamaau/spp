<div>
    <button wire:click.prevent="create" type="button" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Tambah
    </button>

    @php
        $title = is_null($pid) ? 'Tambah Kelas' : 'Ubah Kelas';
    @endphp


    <x-modals.modal id="createOrUpdate" :title="$title">
        <form>
            <x-slot name="body">
                <div class="form-group">
                    <x-inputs.select-two
                        required
                        label="role"
                        name="role"
                        :items="$roles"
                        wire:model="role"
                    />
                </div>
                <div class="form-group">
                    <x-inputs.text
                        required
                        label="nama"
                        name="name"
                        wire:model.defer='name'
                    />
                </div>
                <div class="form-group">
                    <x-inputs.email
                        required
                        label="email"
                        name="email"
                        wire:model.defer='email'
                    />
                </div>
                <div class="form-group">
                    <x-inputs.password
                        required
                        label="password"
                        name="password"
                        wire:model.defer='password'
                    />
                    @if (!is_null($pid))
                        <small class="text-info">Kosongkan password jika tidak ingin mengubah password.</small>
                    @endif
                </div>
                <div class="form-group">
                    <x-inputs.password
                        required
                        label="konfirmasi password"
                        name="passwordConfirmation"
                        wire:model.defer='passwordConfirmation'
                    />
                </div>
                <div class="form-group">
                    <x-inputs.select-constant
                        required
                        label="status"
                        name="status"
                        :items="\Modules\Setting\Constants\UserConstant::labels()"
                        wire:model="status"
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

                Livewire.hook('message.processed', (message, component) => {
                    customSelect('#role', {
                        alloweClear: false,
                        placeholder: "",
                    }, (e) => {
                        @this.set('role', e.target.value);
                    });

                    customSelect('#status', {
                        alloweClear: false,
                        placeholder: "",
                    }, (e) => {
                        @this.set('status', e.target.value);
                    });
                });
                
                Livewire.on('delete', (id) => {
                    CustomDeleteSwall({
                        title: "Apakah anda yakin?",
                        message: "Semua data yang pernah ditambahkan oleh operator ini akan dihapus permanen",
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
