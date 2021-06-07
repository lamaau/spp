<div>
    <div class="card">
        <div class="card-header">
            <h4>Environment Pusher</h4>
        </div>
        <div class="card-body">
            @if (!$pusherConfigured)
                <div class="alert alert-primary alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Penting!</div>
                        Jika pusher tidak dikonfigurasi maka beberapa fitur tidak dapat digunakan.
                    </div>
                </div>
            @endif

            <form wire:submit.prevent="save">
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="app_id"
                        label="App Id"
                        wire:model.defer="app_id"
                    />
                </div>
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="app_key"
                        label="App Key"
                        wire:model.defer="app_key"
                    />
                </div>
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="app_secret"
                        label="App Secret"
                        wire:model.defer="app_secret"
                    />
                </div>
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="app_cluster"
                        label="App Cluster"
                        wire:model.defer="app_cluster"
                    />
                </div>
                <div class="text-right">
                    <button wire:click.prevent="$emit('delete-pusher')" class="btn btn-danger"
                        @if (!$pusherConfigured)
                            disabled
                        @endif
                    >Hapus</button>
                    <button type="submit" class="btn btn-primary" id="save-btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                Livewire.on('delete-pusher', () => {
                    CustomDeleteSwall({
                        title: "Apakah anda yakin?",
                        message: "Beberapa fitur tidak dapat digunakan setelah konfigurasi ini dihapus.",
                    }, (event) => {
                        if (event.isConfirmed) {
                            @this.call('delete', event.value);
                        }
                    });
                });
            });
        </script>
    @endpush
</div>