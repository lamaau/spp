<div>
    <div class="card">
        <div class="card-header">
            <h4>Environment Pusher</h4>
        </div>
        <div class="card-body">
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
                    <button type="submit" class="btn btn-primary" id="save-btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>