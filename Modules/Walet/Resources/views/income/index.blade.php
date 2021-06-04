<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Keuangan</a></div>
                <div class="breadcrumb-item">Pemasukan</div>
            </div>
        </div>
        <div class="row">
            @foreach ($stats as $key => $stat)
                <x-percentage :result="$stats[$key]" />
            @endforeach
        </div>

        <div class="row">
            @foreach ($bills as $item)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <a href="#">
                        <x-widget
                            type="success"
                            :title="$item->name"
                            icon="fas fa-dollar-sign"
                            :value="idr($item->payments_sum_pay)"
                        />
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
