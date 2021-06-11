<div class="card-body">
    <div class="d-flex">
        <h6 class="mb-0 mt-2">{{ $title }}</h6>
        <div class="ml-auto">
            <a href="{{ route('payment.print-yearly', ['user' => $student, 'bill' => $bill, 'year' => $year, 'type' => $type]) }}"
                target="_blank" class="btn btn-dark">
                <i class="fa fa-print"></i>
            </a>
        </div>
    </div>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Tagihan</th>
                <th>Nominal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($semester as $i => $e)
                @php
                    $any = isset($payments[$i]);
                    $totalForStatus = [];
                    if ($any) {
                        foreach ($payments[$i] as $key => $value) {
                            $totalForStatus[] = $value['pay'];
                        }
                    }
                @endphp
                <tr>
                    <td>
                        <strong>{{ $e }}</strong>
                    </td>
                    <td>{{ $billResult->name }}</td>
                    <td>{{ idr($billResult->nominal) }}</td>
                    <td>
                        @if (array_sum($totalForStatus) === $billResult['nominal'])
                            <span class="badge badge-success" style="font-size: 11px; padding: 3px 8px">Lunas</span>
                        @else
                            <span class="badge badge-danger" style="font-size: 11px; padding: 3px 8px">Tunggak</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-info btn-sm" role="button" data-toggle="collapse"
                            data-target="#table-detail-{{ $i }}">
                            <i class="fad fa-eye"></i>
                        </button>
                        <a href="{{ route('payment.print-monthly', ['user' => $student, 'bill' => $bill, 'month' => $i, 'year' => $year, 'type' => $type]) }}" target="_blank"
                            class="btn btn-dark btn-sm {{ !$any && empty($payments[$i]) ? 'disabled' : '' }}"
                            {{ !$any && empty($payments[$i]) ? 'disabled' : '' }}>
                            <i class="fad fa-print"></i>
                        </a>
                        <button wire:click.prevent='pay("{{ $i }}")' class="btn btn-sm btn-success"
                            {{ array_sum($totalForStatus) === $billResult['nominal'] ? 'disabled' : '' }}>
                            <i class="fad fa-money-bill-alt"></i>
                        </button>
                    </td>
                </tr>
                @if ($any)
                    <tr>
                        <td colspan="12" class="hiddenRow">
                            <div class="collapse" id="table-detail-{{ $i }}" wire:ignore.self>
                                <table class="table table-striped table-inner">
                                    <thead class="thead-dark">
                                        <tr class="info">
                                            <th>Kode Transaksi</th>
                                            <th>Dibayar</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Operator</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @if (!empty($payments[$i]))
                                        <tbody>
                                            @foreach ($payments[$i] as $item)
                                                @php
                                                    $total[$i][] = $item['pay'];
                                                    $totalChange[$i][] = $item['change'];
                                                @endphp
                                                <tr>
                                                    <td>{{ $item['code'] }}</td>
                                                    <td>{{ idr($item['pay']) }}</td>
                                                    <td> {{ format_date($item['pay_date']) }}</td>
                                                    <td>{{ $item['author_name'] }}</td>
                                                    <td>
                                                        <button class="btn btn-danger btn-sm" wire:click.prevent="$emit('delete', '{{$item['id']}}')"><i class="fad fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="table-inner">
                                            @php
                                                $resultOfTotalPayment = array_sum($total[$i]);
                                                $resultOfTotalChange = array_sum($totalChange[$i]);
                                            @endphp
                                            <tr>
                                                <th>Total Dibayar</th>
                                                <th>
                                                    <strong>{{ idr($resultOfTotalPayment) }}</strong>
                                                </th>
                                                <th colspan="3" class="text-center">-</th>
                                            </tr>
                                            <tr>
                                                <th>Sisa Pembayaran</th>
                                                <th>
                                                    <strong>{{ idr($billResult->nominal - $resultOfTotalPayment) }}</strong>
                                                </th>
                                                <th colspan="3" class="text-center">-</th>
                                            </tr>
                                        </tfoot>
                                    @endif
                                </table>
                            </div>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="12" class="hiddenRow">
                            <div class="collapse" id="table-detail-{{ $i }}" wire:ignore.self>
                                <table class="table table-striped table-inner">
                                    <thead class="thead-dark">
                                        <tr class="info">
                                            <th>Kode Transaksi</th>
                                            <th>Dibayar</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Operator</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="4" align="center">Tidak ada transaksi</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
