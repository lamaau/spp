<div>
    <div class="card">
        <div class="card-header">
            <h4>Environment Email</h4>
        </div>
        <div class="card-body">
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
                    <x-inputs.number
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
                    <x-inputs.text
                        required
                        name="from_address"
                        label="Mail From Address"
                        wire:model.defer="from_address"
                    />
                </div>
                <div class="text-right">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>