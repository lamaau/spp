<x-pdf-layout :title="$title" :cop="true" :ttd="true">
    @section('content')
        <div class="content-container">
            <div class="content-header">
                <h2 style="color: rgb(24, 23, 23);">Bukti Pembayaran {{ $rows->first()->bill->name }}
                </h2>
                <div class="line-1"></div>
            </div>

            <table style="width: 100%; margin-bottom: 1rem;">
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $rows->first()->student->name }}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td>{{ $rows->first()->student->room->name }}</td>
                            </tr>
                            <tr>
                                <td>Tahun</td>
                                <td>:</td>
                                <td>{{ $rows->first()->school_year->year }}</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table style="float:right;">
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>{{ date('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <td>Tagihan</td>
                                <td>:</td>
                                <td>{{ $rows->first()->bill->name }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                @php
                                    $nominal = $rows->first()->bill->nominal;
                                    
                                    $tmp = [];
                                    foreach ($rows as $key => $value) {
                                        $tmp[] = $value->pay;
                                    }
                                    
                                    $total = array_sum($tmp);
                                @endphp
                                <td>{{ $total < $nominal ? idr($total - $nominal) : 'Lunas' }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $index => $item)
                        <tr>
                            <td>{{ ++$index }}.</td>
                            <td>{{ idr($item->pay) }}</td>
                            <td>{{ format_date($item->created_at) }}</td>
                            <td>{{ idr($item->pay) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" align="center">Jumlah</td>
                        <td>{{ idr($total) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    @endsection
    @push('styles')
        <style>
            @page {
                size: portrait;
            }

        </style>
    @endpush
    @push('scripts')
        <script>
            window.onload = function() {
                window.print();
            };

        </script>
    @endpush
</x-pdf-layout>
