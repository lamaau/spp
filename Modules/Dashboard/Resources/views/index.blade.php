<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            </div>
        </div>

        <div class="row">
            <x-widget
                type="success"
                title="Pemasukan"
                :value="idr($income)"
                icon="fas fa-dollar-sign"
            />

            <x-widget
                type="danger"
                title="Pengeluaran"
                :value="idr($spending)"
                icon="fas fa-dollar-sign"
            />

            <x-widget
                type="primary"
                title="Siswa"
                :value="$student"
                icon="fas fa-users"
            />

            <x-widget
                type="warning"
                title="Tagihan"
                :value="$bill"
                icon="far fa-money-bill-alt"
            />
        </div>

        <div class="row">
            <div class="col-12">
                <livewire:finance-dashboard-chart />
            </div>
        </div>
    </section>
</x-app-layout>
