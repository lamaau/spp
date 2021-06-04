<x-pdf-layout :title="$title" :cop="true" :ttd="true">
    @section('content')
        @php
            $detail = $results['detail'];
            unset($results['detail']);
        @endphp

        <div class="content-container">
            <div class="content-header">
                <h2 style="color: rgb(24, 23, 23);">Bukti Pembayaran {{ $detail['bill']->name }} Tahun
                    {{ $detail['year']->year }}
                </h2>
                <div class="line-1"></div>
            </div>

            <table style="width: 100%; margin-bottom: 1rem;">
                <tr style="text-align: left;">
                    <td>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $detail['student']->name }}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td>{{ $detail['student']->room->name }}</td>
                            </tr>
                            <tr>
                                <td>Tahun</td>
                                <td>:</td>
                                <td>{{ $detail['year']->year }}</td>
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
                                <td>{{ $detail['bill']->name }}</td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td>:</td>
                                <td>{{ ucfirst($type) }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table class="table">
                <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Nominal</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semesters as $index => $month)
                        @php
                            $any = isset($results[$index]);
                            $totalPayments = [];
                            if ($any) {
                                foreach ($results[$index] as $key => $value) {
                                    $totalPayments[] = $value->pay;
                                }
                            }
                        @endphp

                        @if ($any)
                            @foreach ($results[$index] as $key => $item)
                                @php
                                    $count = count($results[$index]);
                                    $sum[] = $key;
                                @endphp

                                <tr>
                                    @if ($key == 0)
                                        <td rowspan="{{ $count }}">
                                            {{ $month }}
                                        </td>
                                    @endif
                                    <td>
                                        {{ idr($item->pay) }}
                                    </td>
                                    <td>
                                        {{ format_date($item->pay_date) }}
                                    </td>
                                    @if ($key == 0)
                                        <td rowspan="{{ $count }}">{{ idr(array_sum($totalPayments)) }}</td>
                                        <td rowspan="{{ $count }}">
                                            @if (array_sum($totalPayments) < $detail['bill']->nominal)
                                                Belum Lunas
                                            @else
                                                Lunas
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>{{ $month }}</td>
                                <td>
                                    {{ idr(0) }}
                                </td>
                                <td>-</td>
                                <td>-</td>
                                <td>Belum Lunas</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
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
