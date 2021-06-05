<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Keuangan</a></div>
                <div class="breadcrumb-item">Pengeluaran</div>
            </div>
        </div>
    </section>

    <livewire:spending-datatable :title="$title" :bills="$bills" />
</x-app-layout>
