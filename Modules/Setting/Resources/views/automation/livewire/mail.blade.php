<div>
    <div class="card">
        <div class="card-header">
            <h4>Environment Email</h4>
        </div>
        <div class="card-body">
            @if (!$mailConfigured)
                <div class="alert alert-primary alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Penting!</div>
                        Jika email tidak dikonfigurasi maka beberapa fitur tidak dapat digunakan.
                    </div>
                </div>
            @endif

            <form wire:submit.prevent="save">
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="driver"
                        label="Mail Driver"
                        wire:model.defer="driver"
                    />
                </div>
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="host"
                        label="Mail Host"
                        wire:model.defer="host"
                    />
                </div>
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="port"
                        label="Mail Port"
                        wire:model.defer="port"
                    />
                </div>
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="username"
                        label="Mail Username"
                        wire:model.defer="username"
                    />
                </div>
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="password"
                        label="Mail Password"
                        wire:model.defer="password"
                    />
                </div>
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="from_name"
                        label="Mail From Name"
                        wire:model.defer="from_name"
                    />
                </div>
                <div class="form-group">
                    <x-inputs.select-constant
                        required
                        label="Encryption"
                        name="encryption"
                        wire:model="encryption"
                        :items="$encryptions"
                    />
                </div>
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="from_address"
                        label="Mail From Address"
                        wire:model.defer="from_address"
                    />
                </div>
                <div class="text-right">
                    <button wire:click.prevent="$emit('delete-mail')" class="btn btn-danger"
                        @if (!$mailConfigured)
                            disabled
                        @endif
                    >Hapus</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                Livewire.on('delete-mail', () => {
                    CustomDeleteSwall({
                        title: "Apakah anda yakin?",
                        message: "Beberapa fitur tidak dapat digunakan setelah konfigurasi ini dihapus.",
                    }, (event) => {
                        if (event.isConfirmed) {
                            @this.call('delete', event.value);
                        }
                    });
                });
                
                customSelect('#encryption', {
                    allowClear: false,
                    placeholder: "",
                }, (e) => {
                    @this.set('encryption', e.target.value);
                });
            });
        </script>
    @endpush
</div>