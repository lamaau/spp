<div>
    @push('styles')
        <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <style type="text/css">
            /* custom for select2 */
            .custom-select-icon .select2-selection__arrow>b {
                display: none;
            }

            .custom-select-icon .select2-selection__arrow {
                background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right .75rem center/8px 10px;
            }

            .select2-selection {
                background-color: #fdfdff !important;
                border-color: #e4e6fc !important;
            }

            .has-error .select2-selection {
                border-color: #dc3545 !important;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #444;
                line-height: 40px;
            }

            .stepwizard-step p {
                margin-top: 10px;
            }

            .stepwizard-row {
                display: table-row;
            }

            .stepwizard {
                display: table;
                width: 100%;
                position: relative;
            }

            .stepwizard-step button[disabled] {
                opacity: 1 !important;
                filter: alpha(opacity=100) !important;
            }

            .stepwizard-row:before {
                top: 14px;
                bottom: 0;
                position: absolute;
                content: " ";
                width: 100%;
                height: 1px;
                background-color: #ccc;
                z-order: 0;
            }

            .stepwizard-step {
                display: table-cell;
                text-align: center;
                position: relative;
            }

            .btn-circle {
                width: 30px;
                height: 30px;
                text-align: center;
                padding: 6px 0;
                font-size: 12px;
                line-height: 1.428571429;
                border-radius: 15px;
            }

            .displayNone {
                display: none;
            }

        </style>
    @endpush
    
    @if(Auth::user()->hasRole("Super Admin"))
        <section class="section mb-5">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <x-logo />
                        </div>
                        <div class="stepwizard">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step">
                                    <button type="button" wire:click.prevent='changeStep(1)'
                                        class="btn {{ $currentStep != 1 ? 'btn-secondary' : 'btn-primary' }} rounded-circle"
                                        {{ !in_array($currentStep, [1, 2]) ? 'disabled' : '' }}>1</button>
                                    <p>Step 1</p>
                                </div>
                                <div class="stepwizard-step">
                                    <button type="button" wire:click.prevent='changeStep(2)'
                                        class="btn {{ $currentStep != 2 ? 'btn-secondary' : 'btn-primary' }} rounded-circle"
                                        {{ !in_array($currentStep, [2, 3]) ? 'disabled' : '' }}>2</button>
                                    <p>Step 2</p>
                                </div>
                                <div class="stepwizard-step">
                                    <button type="button"
                                        class="btn {{ $currentStep != 3 ? 'btn-secondary' : 'btn-primary' }} rounded-circle"
                                        {{ $currentStep != 3 ? 'disabled' : '' }}>3</button>
                                    <p>Step 3</p>
                                </div>
                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>
                                    {{ $title[$currentStep] }}
                                </h4>
                            </div>

                            <div class="card-body">
                                <form method="POST">
                                    <div class="{{ $currentStep != 1 ? 'displayNone' : '' }}">
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <x-inputs.text
                                                    required
                                                    name="name"
                                                    label="nama sekolah"
                                                    wire:model.defer='name'
                                                />
                                            </div>
                                            <div class="form-group col-6">
                                                <x-inputs.number
                                                    required
                                                    name="code"
                                                    label="kode sekolah"
                                                    wire:model.defer='code'
                                                />
                                            </div>
                                            <div class="form-group col-6">
                                                <x-inputs.email
                                                    required
                                                    name="email"
                                                    label="email sekolah"
                                                    wire:model.defer='email'
                                                />
                                            </div>
                                            <div class="form-group col-6">
                                                <x-inputs.number
                                                    required
                                                    name="phone"
                                                    label="Telpon Sekolah"
                                                    wire:model.defer='phone'
                                                />
                                            </div>
                                            <div class="form-group col-6">
                                                <x-inputs.select-constant
                                                    required
                                                    name="level"
                                                    label="tingkatan"
                                                    :items="$levels"
                                                />
                                            </div>
                                            <div class="form-group col-6">
                                                <x-inputs.number
                                                    required
                                                    name="fax"
                                                    label="Fax Sekolah"
                                                    wire:model.defer='fax'
                                                />
                                            </div>

                                            <div class="form-group col-12">
                                                <label for="file">Logo <small class="text-danger">*</small></label>
                                                <div class="input-group mb-1">
                                                    <input wire:model='logo' accept="image/png, image/jpeg" name="logo"
                                                        type="file"
                                                        class="form-control @error('logo') is-invalid @enderror">
                                                    <div class="input-group-append">
                                                        <button data-toggle="modal" data-target="#preview-logo"
                                                            class="btn btn-outline-primary" type="button" @if (!$logo) disabled @endif>Lihat</button>
                                                    </div>
                                                </div>
                                                @error('logo')
                                                    <small class="text-validate-error">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="{{ $currentStep != 2 ? 'displayNone' : '' }}">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <div class="form-group">
                                                    <x-inputs.text
                                                        required
                                                        name="city_name"
                                                        label="Nama Kota"
                                                        wire:model.defer="city_name"
                                                    />
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Alamat Lengkap
                                                        <small class="text-danger">*</small>
                                                    </label>
                                                    <textarea name="adress" id="adress" cols="30" rows="10" wire:model='address'
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        style="min-height: 110px;"></textarea>
                                                    @error('address')
                                                        <small class="text-validate-error">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="{{ $currentStep != 3 ? 'displayNone' : '' }}">
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <x-inputs.text
                                                    required
                                                    name="principal"
                                                    label="nama kepala sekolah"
                                                    wire:model.defer='principal'
                                                />
                                            </div>
                                            <div class="form-group col-6">
                                                <x-inputs.number
                                                    required
                                                    name="principal_number"
                                                    label="nip kepala sekolah"
                                                    wire:model.defer='principal_number'
                                                />
                                            </div>
                                            <div class="form-group col-6">
                                                <x-inputs.text
                                                    required
                                                    name="treasurer"
                                                    label="nama bendahara sekolah"
                                                    wire:model.defer='treasurer'
                                                />
                                            </div>
                                            <div class="form-group col-6">
                                                <x-inputs.number
                                                    name="treasurer_number"
                                                    label="nip bendahara sekolah"
                                                    wire:model.defer='treasurer_number'
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group float-left">
                                        @if ($currentStep != 1)
                                            <button wire:click.prevent='prevStep' type="button"
                                                class="btn btn-primary btn-lg">
                                                <i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Kembali
                                            </button>
                                        @endif
                                    </div>

                                    @if ($totalStep > $currentStep)
                                        @if ($currentStep == 1)
                                            <div class="form-group float-right">
                                                <button wire:click.prevent='firstStepSubmit' type="button"
                                                    class="btn btn-primary btn-lg">
                                                    Lanjut&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        @endif

                                        @if ($currentStep == 2)
                                            <div class="form-group float-right">
                                                <button wire:click.prevent='secondStepSubmit' type="button"
                                                    class="btn btn-primary btn-lg">
                                                    Lanjut&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        @endif
                                    @else
                                        <div class="form-group float-right">
                                            <button wire:click.prevent='submitForm' type="button"
                                                class="btn btn-primary btn-lg">
                                                <i class="fa fa-save"></i>&nbsp;&nbsp;Simpan
                                            </button>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-modals.modal id="preview-logo" title="Preview Logo Sekolah">
            <x-slot name="body">
                @if ($logo)
                    <img src="{{ $logo->temporaryUrl() }}" alt="Logo Sekolah" style="width: 100%;">
                @endif
            </x-slot>
        </x-modals.modal>
    @else
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <x-logo />
                    </div>

                    <div class="card card-danger">
                        <div class="card-header">
                            <h4 class="text-danger">Pembatasan Hak Akses</h4>
                        </div>

                        <div class="card-body">
                            <p>Anda tidak memiliki hak akses untuk melakukan setup aplikasi, setup aplikasi hanya bisa dilakukan oleh user dengan role Super Admin</p>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit()">Keluar</a>
                            <form action="{{ route('logout') }}" method="post" id="logout" style="display: none;">
                                @csrf
                                @method('post')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://demo.getstisla.com/assets/modules/select2/dist/js/select2.full.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#level, #province, #city, #district, #subdistrict').select2({
                    allowClear: false,
                    placeholder: "",
                });

                $('#level').on('change', (e) => {
                    @this.set('level', e.target.value);
                });
            });

            Livewire.hook('message.processed', (message, component) => {
                $('#level').select2({
                    allowClear: false,
                    placeholder: "",
                });
            });

        </script>
    @endpush
</div>
