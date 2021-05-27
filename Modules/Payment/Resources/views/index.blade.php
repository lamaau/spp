<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Keuangan</a></div>
                <div class="breadcrumb-item">Pembayaran</div>
            </div>
        </div>
    </section>

    <livewire:payment
        :bills="$bills"
        :years="$years"
        :students="$students"
    />
</x-app-layout>
