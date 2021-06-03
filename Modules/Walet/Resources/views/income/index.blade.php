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
            @foreach ($bills as $item)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <x-widget
                        type="success"
                        :title="$item->name"
                        :value="idr($item->payments_sum_pay)"
                        icon="fas fa-dollar-sign"
                    />
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
