<div class="ttd-container">
    <table style="text-align: center;float: right;">
        <tr>
            <td>
                <div>
                    <span style="display: block;">Ternate,
                        {{ \Carbon\Carbon::parse(now())->translatedFormat('d F Y') }}</span>
                    <span>Yang Menerima,</span>
                    <br /><br /><br />
                    <span>{{ auth()->user()->name }}</span>
                </div>
            </td>
        </tr>
    </table>
</div>
