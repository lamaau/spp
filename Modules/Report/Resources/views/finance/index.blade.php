<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="#" onclick="window.history.back();" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Ekstra</a></div>
                <div class="breadcrumb-item"><a href="{{ route('report.index') }}">Laporan</a></div>
                <div class="breadcrumb-item">Keuangan</div>
            </div>
        </div>
    </section>
</x-app-layout>