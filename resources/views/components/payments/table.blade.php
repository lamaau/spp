<div class="card-body">
    <h6>{{ $title }}</h6>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Tagihan</th>
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
                    <td>{{ idr($billResult->nominal) }}</td>
                    <td>
                        @if (array_sum($totalForStatus) === $billResult['nominal'])
                            <span class="badge badge-success" style="font-size: 11px; padding: 3px 8px">Lunas</span>
                        @else
                            <span class="badge badge-danger" style="font-size: 11px; padding: 3px 8px">Tunggak</span>
                        @endif
                    </td>
                    <td style="width: 9.5rem;">
                        <button class="btn btn-info btn-sm" role="button" @if ($any) data-toggle="collapse" data-target="#table-detail-{{ $i }}" @endif {{ !$any && empty($payments[$i]) ? 'disabled' : '' }}>
                            <i class="fa fa-eye"></i>
                        </button>
                        <a href="{{ route('payment.pdf-monthly', ['user' => $student, 'bill' => $bill, 'year' => $year, 'month' => $i]) }}" target="_blank"
                            class="btn btn-dark btn-sm {{ !$any && empty($payments[$i]) ? 'disabled' : '' }}"
                            {{ !$any && empty($payments[$i]) ? 'disabled' : '' }}>
                            <i class="fa fa-print"></i>
                        </a>
                        <button wire:click.prevent='pay("{{ $i }}")' class="btn btn-sm btn-success"
                            {{ array_sum($totalForStatus) === $billResult['nominal'] ? 'disabled' : '' }}>
                            <i class="far fa-money-bill-alt"></i>
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
                                            <th>Dibayar</th>
                                            <th>Kembalian</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @if (!empty($payments[$i]))
                                        <tbody>
                                            @foreach ($payments[$i] as $item)
                                                @php
                                                    $total[$i][] = $item['pay'];
                                                @endphp
                                                <tr>
                                                    <td>{{ idr($item['pay']) }}</td>
                                                    <td> {{ idr($item['change']) }}
                                                    </td>
                                                    <td> {{ format_date($item['pay_date']) }}
                                                    </td>
                                                    <td style="width: 9.5rem;">
                                                        <button class="btn btn-danger btn-sm"
                                                            wire:click.prevent='swalRemove("{{ $item['id'] }}")'>
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="table-inner">
                                            @php
                                                $resultOfTotalPayment = array_sum($total[$i]);
                                            @endphp
                                            <tr>
                                                <td>Total:
                                                    <strong>{{ idr($resultOfTotalPayment) }}</strong>
                                                </td>
                                                <td>Tersisa:
                                                    @php
                                                        $result = $resultOfTotalPayment - $billResult->nominal;
                                                    @endphp
                                                    <strong>{{ idr($result) }}</strong>
                                                </td>
                                                <td colspan="2">-</td>
                                            </tr>
                                        </tfoot>
                                    @endif
                                </table>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
