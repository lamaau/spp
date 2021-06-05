<div>
    <div class="section">
        <div class=" section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form>
                            <div class="card-body mt-4">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group custom-select-icon" wire:ignore>
                                            <select class="custom-select" id="search-student" wire:model='student'>
                                                <option></option>
                                                @foreach ($students as $item)
                                                    <option value="{{ $item->id }}">
                                                        @if ($item->nis)
                                                            {{ $item->name }} - {{ $item->nis }}
                                                        @else
                                                            {{ $item->name }}
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4">
                                        <div class="form-group custom-select-icon" wire:ignore>
                                            <select class="custom-select" id="search-bill" wire:model='bill'>
                                                <option></option>
                                                @foreach ($bills as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col col-lg-2">
                                        <div class="form-group custom-select-icon" wire:ignore>
                                            <select class="custom-select" id="search-year" wire:model='year'>
                                                <option></option>
                                                @foreach ($years as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->year }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <button wire:click.prevent='search' type="button" role="button"
                                            class="btn btn-primary" style="padding: 8px 30px;"
                                            {{ is_null($student) || is_null($bill) || is_null($year) ? 'disabled' : '' }}>
                                            Cari
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 text-center" wire:loading wire:target='search'>
                    Loading...
                </div>
                
                @if (is_null($billResult))
                    <div class="col-12 text-center" wire:target="search" wire:loading.remove>
                        <img src="{{ asset('css/img/empty.png') }}" width="500">
                    </div>
                @endif

                <div class="col-12" wire:target='search' wire:loading.remove>
                    @if ($billResult && $billResult->monthly)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Detail Pembayaran</h4>
                            </div>

                            <x-payments.table-monthly
                                :year="$year"
                                :bill="$bill"
                                :semester="$odd"
                                :student="$student"
                                :payments="$payments"
                                title="Semester Ganjil" 
                                :bill-result="$billResult"
                                type="ganjil"
                            />

                            <x-payments.table-monthly
                                :year="$year"
                                :bill="$bill"
                                :semester="$even"
                                :student="$student"
                                :payments="$payments"
                                title="Semester Genap"
                                :bill-result="$billResult"
                                type="genap"
                            />
                        </div>
                    @endif

                    @if ($billResult && !$billResult->monthly)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Detail Pembayaran</h4>
                            </div>
                            <x-payments.table-not-monthly
                                :bill="$billResult"
                                :payments="$payments"
                            />
                        </div>
                    @endif
                </div>
            </div>

            <x-modals.modal id="pay" title="Pembayaran">
                <form>
                    <x-slot name="body">
                        <div class="form-group">
                            <x-inputs.text
                                required
                                name="pay_date"
                                class="datepicker"
                                wire:model.defer='pay_date'
                                label="tanggal bayar"
                            />
                        </div>
                        <div class="form-group">
                            <x-inputs.number
                                required
                                name="pay"
                                label="nominal"
                                wire:model='pay'
                            />
                        </div>
                        <div class="form-group">
                            <x-inputs.number
                                disabled
                                name="change"
                                label="kembalian"
                                wire:model='change'
                                value="{{ idr($change) }}"
                            />
                        </div>
                    </x-slot>
                    <x-slot name="footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button wire:click.prevent="onPay" class="btn btn-primary"
                            {{ $paymentState ? 'disabled' : '' }}>Bayar</button>
                    </x-slot>
                </form>
            </x-modals.modal>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                Livewire.on("notify", () => {
                    $('#pay').modal('hide');
                });

                Livewire.on("pay", () => {
                    $('#pay').modal('toggle');
                });

                Livewire.on('delete', (id) => {
                    CustomDeleteSwall({
                        title: "Apakah anda yakin?",
                        message: "Data Pembayaran yang telah dihapus tidak dapat dikembalikan."
                    }, (event) => {
                        if (event.isConfirmed) {
                            @this.call('delete', id, event.value);
                        }
                    });
                });

                $('#pay_date').on('change', (e) => {
                    @this.set('pay_date', e.target.value);
                });

                customSelect('#search-student', {
                    allowClear: false,
                    placeholder: 'Pilih Siswa'
                }, (e) => {
                    @this.set('student', e.target.value);
                });

                customSelect('#search-bill', {
                    allowClear: false,
                    placeholder: 'Pilih Tagihan'
                }, (e) => {
                    @this.set('bill', e.target.value);
                });

                customSelect('#search-year', {
                    allowClear: false,
                    placeholder: 'Pilih Tahun'
                }, (e) => {
                    @this.set('year', e.target.value);
                });
            });

        </script>
    @endpush
</div>
