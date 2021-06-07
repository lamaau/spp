<div class="ttd-container">
    <table style="text-align: center;float: right;">
        <tr>
            <td>
                <div>
                    <span style="display: block;text-transform:capitalize;">
                        {{strtolower(\Regional::findCity($setting->city)['name'])}},
                        {{ \Carbon\Carbon::parse(now())->translatedFormat('d F Y') }}</span>
                    <span>Yang Menerima,</span>
                    <br /><br /><br />
                    <span>{{ $setting->treasurer }}</span>
                </div>
            </td>
        </tr>
    </table>
</div>
