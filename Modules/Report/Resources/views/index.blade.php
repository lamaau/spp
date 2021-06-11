<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Ekstra</a></div>
                <div class="breadcrumb-item">Laporan</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Gambaran</h2>
            <p class="section-lead">
                Berisi semua laporan dari aplikasi ini.
            </p>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fad fa-users"></i>
                        </div>
                        <div class="card-body">
                            <h4>Siswa</h4>
                            <p>Data statistik siswa.</p>
                            <a href="{{ route('report.student') }}" class="card-cta text-primary">
                                Lihat
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fad fa-dollar-sign"></i>
                        </div>
                        <div class="card-body">
                            <h4>Keuangan</h4>
                            <p>Data statistik keuangan.</p>
                            <a href="{{ route('report.finance') }}" class="card-cta">
                                Lihat
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
