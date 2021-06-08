<div>
    <div class="row">
        <div class="col-md-8">
            <div class="card" id="settings-card">
                <div class="card-header">
                    <h4>General Settings</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row align-items-center">
                        <label for="name" class="form-control-label col-sm-3 text-md-right">
                            Nama Sekolah
                        </label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="name" wire:model.defer='name' class="form-control" id="name">
                            @error('name')
                                <small class="text-validate-error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="level" class="form-control-label col-sm-3 text-md-right">
                            Derajat Sekolah
                        </label>
                        <div class="col-sm-6 col-md-9 custom-select-icon" wire:ignore>
                            <select name="level" class="custom-select" id="level" wire:model="level">
                                <option></option>
                                @foreach ($levels as $key => $name)
                                    <option value="{{ $key }}"
                                        {{ $key == $setting->level ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('level')
                                <small class="text-validate-error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="email" class="form-control-label col-sm-3 text-md-right">
                            Email Sekolah
                        </label>
                        <div class="col-sm-6 col-md-9">
                            <input type="email" name="email" wire:model.defer='email' class="form-control" id="email">
                        </div>
                        @error('email')
                            <small class="text-validate-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="phone" class="form-control-label col-sm-3 text-md-right">
                            Nomor Hp Sekolah
                        </label>
                        <div class="col-sm-6 col-md-9">
                            <input type="number" name="phone" wire:model.defer='phone' class="form-control" id="phone">
                        </div>
                        @error('phone')
                            <small class="text-validate-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="fax" class="form-control-label col-sm-3 text-md-right">
                            Fax Sekolah
                        </label>
                        <div class="col-sm-6 col-md-9">
                            <input type="number" name="fax" wire:model.defer='fax' class="form-control" id="fax">
                        </div>
                        @error('fax')
                            <small class="text-validate-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="code" class="form-control-label col-sm-3 text-md-right">
                            Kode Sekolah
                        </label>
                        <div class="col-sm-6 col-md-9">
                            <input type="number" name="code" wire:model.defer='code' class="form-control" id="code">
                        </div>
                        @error('code')
                            <small class="text-validate-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="principal" class="form-control-label col-sm-3 text-md-right">
                            Kepala Sekolah
                        </label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="principal" wire:model.defer='principal' class="form-control"
                                id="principal">
                            @error('principal')
                                <small class="text-validate-error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="principal_number" class="form-control-label col-sm-3 text-md-right">
                            Nip Sekolah
                        </label>
                        <div class="col-sm-6 col-md-9">
                            <input type="number" name="principal_number" wire:model.defer='principal_number'
                                class="form-control" id="principal_number">
                            @error('principal_number')
                                <small class="text-validate-error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="treasurer" class="form-control-label col-sm-3 text-md-right">
                            Bendahara
                        </label>
                        <div class="col-sm-6 col-md-9">
                            <input type="text" name="treasurer" wire:model.defer='treasurer' class="form-control"
                                id="treasurer">
                            @error('treasurer')
                                <small class="text-validate-error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="treasurer_number" class="form-control-label col-sm-3 text-md-right">
                            Nip Bendahara
                        </label>
                        <div class="col-sm-6 col-md-9">
                            <input type="number" name="treasurer_number" wire:model.defer='treasurer_number'
                                class="form-control" id="treasurer_number">
                            @error('treasurer_number')
                                <small class="text-validate-error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label class="form-control-label col-sm-3 text-md-right">Logo Sekolah</label>
                        <div class="col-sm-6 col-md-9">
                            <div class="custom-file">
                                <input type="file" name="logo" wire:model='logo'
                                    class="custom-file-input @error('logo') is-invalid @enderror">
                                <label class="custom-file-label">Choose File</label>
                            </div>
                            @error('logo')
                                <small class="text-validate-error">{{ $message }}</small>
                            @enderror
                            <div class="form-text text-muted">
                                The image must have a maximum size of 1MB
                                <span data-toggle="modal" data-target="#img" class="d-block text-info mr-auto"
                                    style="cursor: pointer;">Lihat Gambar</span>
                            </div>
                        </div>
                        <x-modals.modal id="img" title="Logo Sekolah">
                            <form>
                                <x-slot name="body">
                                    <img src="{{ asset($logo) }}" alt="Logo Sekolah" style="width: 100%;">
                                </x-slot>
                                <x-slot name="footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </x-slot>
                            </form>
                        </x-modals.modal>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="address" class="form-control-label col-sm-3 text-md-right">
                            Alamat
                        </label>
                        <div class="col-sm-6 col-md-9">
                            <textarea name="address" wire:model.defer='address' id="address" class="form-control"
                                style="min-height: 120px;"></textarea>
                            @error('address')
                                <small class="text-validate-error">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Aksi</h4>
                </div>
                <div class="card-body">
                    <button wire:click.prevent='setDefault' type="button" class="btn btn-secondary">Reset</button>
                    <button wire:click.prevent='save' type="button" class="btn btn-primary"
                        id="save-btn">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                customSelect('#level', {
                    allowClear: false,
                    placeholder: 'Pilih Level'
                }, (e) => {
                    @this.set('level', e.target.value);
                });
            });

        </script>
    @endpush
</div>
