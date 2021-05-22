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

                @if ($billResult && $billResult->monthly)
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Detail Pembayaran</h4>
                                <div class="card-header-action">
                                    <div>
                                        <a href="{{ route('payment.pdf-yearly', ['user' => $student, 'bill' => $bill, 'year' => $year]) }}"
                                            target="_blank" class="btn btn-dark">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <x-payments.table :year="$year" :bill="$bill" :semester="$odd" :student="$student"
                                :payments="$payments" title="Semester Ganjil" :bill-result="$billResult" />

                            <x-payments.table :year="$year" :bill="$bill" :semester="$even" :student="$student"
                                :payments="$payments" title="Semester Genap" :bill-result="$billResult" />
                        </div>
                    </div>
                @endif

                @if ($billResult && !$billResult->monthly)
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Detail Pembayaran</h4>
                                <div class="card-header-action">
                                    <div>
                                        <a href="{{ route('payment.pdf-yearly', ['user' => $student, 'bill' => $bill, 'year' => $year]) }}"
                                            target="_blank" class="btn btn-dark">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <x-modals.modal id="pay" title="Pembayaran">
                <form>
                    <x-slot name="body">
                        @if ($paymentState)
                            <div class="alert alert-danger alert-has-icon">
                                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Oops..</div>
                                    Pembayaran pada bulan ini telah lunas.
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <x-inputs.text required id="pay_date" name="pay_date" class="datepicker"
                                wire:model='pay_date' label="tanggal bayar" />
                        </div>
                        <div class="form-group">
                            <x-inputs.number required name="pay" label="nominal" wire:model='pay' />
                        </div>
                        <div class="form-group">
                            <x-inputs.text disabled name="change" label="kembalian" wire:model='change'
                                value="{{ idr($change) }}" />
                        </div>
                    </x-slot>
                    <x-slot name="footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" wire:click.prevent='onPay' class="btn btn-primary"
                            {{ $paymentState ? 'disabled' : '' }}>Bayar</button>
                    </x-slot>
                </form>
            </x-modals.modal>
        </div>

        @push('styles')
            <link rel="stylesheet"
                href="https://demo.getstisla.com/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
            <style type="text/css">
                .hiddenRow {
                    height: 0 !important;
                    padding: 0 !important;
                }

                .table-inner {
                    background-color: rgba(172, 172, 172, 0.08);
                    border-top: 2px solid #d8d8d8;
                }

            </style>
        @endpush

        @push('scripts')
            <script src="https://demo.getstisla.com/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", () => {
                    Livewire.on("notify", () => {
                        $('#pay').modal('hide');
                    });

                    Livewire.on("pay", () => {
                        $('#pay').modal('toggle');
                    });

                    Livewire.on("remove", (id) => {
                        swal({
                                title: 'Hapus data pembayaran?',
                                text: 'Data pembayaran yang dihapus tidak dapat dikembalikan!',
                                icon: 'warning',
                                buttons: true,
                                dangerMode: true,
                                buttons: ['Batal', 'Hapus']
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    @this.call('remove', id);
                                }
                            });
                    });
                });

                $(document).ready(function() {
                    if ($(".datepicker").length) {
                        $('.datepicker').daterangepicker({
                            locale: {
                                format: 'YYYY-MM-DD'
                            },
                            singleDatePicker: true,
                        });
                    }

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
</div>
