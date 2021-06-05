<div>
    <div class="card">
        <div class="card-header">
            <h4>Statistik Pemasukan & Pengeluaran Tahun {{ date('Y') }}</h4>
        </div>
        <div class="card-body">
            <x-apex.line-chart
                :chart-id="$id"
                :chart-data="$data"
                :chart-category="$categories"
            />
        </div>
    </div>
</div>
