<div>
    <div class="section-body">
        <div class="row">
            <div class="col-8">
                <form
                    @if (is_null($pid))
                        wire:submit.prevent="save"
                    @else
                        wire:submit.prevent="update"
                    @endif
                >
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <x-inputs.text
                                    required
                                    name="name"
                                    label="nama"
                                    wire:model.defer="name"
                                />
                            </div>
                            <div class="form-group">
                                <x-inputs.number
                                    name="nis"
                                    label="nis"
                                    wire:model.defer="nis"
                                />
                            </div>
                            <div class="form-group">
                                <x-inputs.number
                                    name="nisn"
                                    label="nisn"
                                    wire:model.defer="nisn"
                                />
                            </div>
                            <div class="form-group">
                                <x-inputs.select-constant
                                    required
                                    name="sex"
                                    label="Jenis Kelamin"
                                    :items="$sexuals"
                                    wire:model="sex"
                                />
                            </div>
                            <div class="form-group">
                                <x-inputs.select-constant
                                    required
                                    name="religion"
                                    label="Agama"
                                    :items="$religions"
                                    wire:model="religion"
                                />
                            </div>
                            <div class="form-group" wire:ignore>
                                <x-inputs.select-two
                                    required
                                    label="Kelas"
                                    name="room"
                                    :items="$rooms"
                                    wire:model="room_id"
                                />
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke text-right">
                            <button type="submit" class="btn btn-primary">
                                @if (is_null($pid))
                                    Tambah
                                @else
                                    Ubah
                                @endif
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <x-widget
                    type="primary"
                    title="Siswa"
                    :value="$studentCount"
                    icon="fad fa-users"
                />
                <x-widget
                    type="primary"
                    title="Kelas"
                    :value="$roomCount"
                    icon="fad fa-building"
                />
            </div>
        </div>
    </div>
    @push('scripts')
        <script type="text/javascript">
            Livewire.on('clear', () => {                
                customSelect('#sex', {
                    allowClear: false,
                    placeholder: ""
                }, (e) => {
                    @this.set('sex', null);
                });

                customSelect('#religion', {
                    allowClear: false,
                    placeholder: "",
                }, (e) => {
                    @this.set('religion', null);
                });

                customSelect('#room_id', {
                    allowClear: false,
                    placeholder: "",
                }, (e) => {
                    @this.set('room_id', null);
                });
            });
        
            $(document).ready(function() {
                customSelect('#sex', {
                    allowClear: false,
                    placeholder: ""
                }, (e) => {
                    @this.set('sex', e.target.value);
                });

                customSelect('#religion', {
                    allowClear: false,
                    placeholder: "",
                }, (e) => {
                    @this.set('religion', e.target.value);
                });

                customSelect('#room', {
                    allowClear: false,
                    placeholder: "",
                }, (e) => {
                    @this.set('room_id', e.target.value);
                });

                Livewire.hook('message.processed', (message, component) => {
                    customSelect('#sex, #religion, #room', {
                        allowClear: false,
                        placeholder: "",
                    });
                });
            });
        </script>
    @endpush
</div>
