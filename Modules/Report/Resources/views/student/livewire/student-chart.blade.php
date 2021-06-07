<div>
    <div class="card">
        <div class="card-header">
            <h4>Statistik Siswa Tahun {{ date('Y') }}</h4>
        </div>
        <div class="card-body">
            <x-apex.column-chart
                :chart-id="$chartId"
                :chart-data="$series"
                :chart-category="$categories"
            />
        </div>
    </div>
</div>  