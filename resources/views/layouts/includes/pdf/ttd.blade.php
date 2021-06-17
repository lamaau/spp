<div class="ttd-container">
    <table style="text-align: center;float: right;">
        <tr>
            <td>
                <div>
                    <span style="display: block;text-transform:capitalize;">
                        {{ $setting->city_name }}
                        {{ \Carbon\Carbon::parse(now())->translatedFormat('d F Y') }}</span>
                    <span>Yang Menerima,</span>
                    <div style="margin-top: 50px">
                        {{ $setting->treasurer }}
                        @if ($setting->treasurer_number)
                            <span style="display: block;border-top:1px solid #000;">
                                Nip. {{ $setting->treasurer_number }}
                            </span>
                        @endif
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
