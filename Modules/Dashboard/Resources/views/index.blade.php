<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <x-widget
                    type="success"
                    title="Total Pemasukan"
                    :value="idr($income)"
                    icon="fad fa-dollar-sign"
                />
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <x-widget
                    type="danger"
                    title="Total Pengeluaran"
                    :value="idr($spending)"
                    icon="fad fa-dollar-sign"
                />
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <x-widget
                    type="primary"
                    title="Total Siswa"
                    :value="$student"
                    icon="fad fa-users"
                />
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <x-widget
                    type="warning"
                    title="Total Tagihan"
                    :value="$bill"
                    icon="far fa-money-bill-alt"
                />
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <livewire:finance-dashboard-chart />
            </div>
        </div>
    </section>
</x-app-layout>
