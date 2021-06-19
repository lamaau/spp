<div>
    @push('styles')
        <style>
            .custom-switch {
                padding-left: 0 !important;
            }
        </style>
    @endpush
    <div class="card card-primary" wire:ignore.self>
        <div class="card-header">
            <h4>Tambah Hak Akses</h4>
        </div>
        <div class="card-body" id="scroller"
            style="height: 499px!important; overflow: hidden; outline: currentcolor none medium;" tabindex="2">
            <div class="form-group">
                <x-inputs.text required label="role" name="role" wire:model.defer="role" />
            </div>
            <div class="form-group custom-select-icon">
                <label>Modul <small class="text-danger">*</small></label>
                <select id="module" name="module" wire:model="module" class="form-control custom-select">
                    <option></option>
                    @foreach ($modules as $key => $module)
                        <option value="{{ strtolower($key) }}">{{ $module }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" wire:ignore.self>
                <div class="form-group">
                    <div class="control-label">Hak akses</div>
                    <div class="form-row">
                        <div class="col">
                            @error('permission_values')
                                <small class="text-validate-error">{{$message}}</small>
                            @enderror
                            <div class="custom-switches-stacked mt-2">
                                @foreach ($permissions as $permission)
                                    <label class="custom-switch">
                                        <input type="checkbox" wire:model="permission_values"
                                            value="{{ $permission->id }}" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">{{ $permission->display_name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right pt-0">
            <button wire:click="resetValue" class="btn btn-secondary">Reset</button>
            @if ($isUpdate)
                <button wire:click="update" class="btn btn-primary">Ubah</button>
            @else
                <button wire:click="savePermission" class="btn btn-primary">Simpan</button>
            @endif
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $("#scroller").css({
                    height: 499
                }).niceScroll();
                customSelect('#module', {
                    allowClear: false,
                    placeholder: "",
                }, (e) => {
                    @this.set('module', e.target.value);
                });
                Livewire.hook('message.processed', (message, component) => {
                    customSelect('#module', {
                        allowClear: false,
                        placeholder: "",
                    });
                });
            });
        </script>
    @endpush
</div>