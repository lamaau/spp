<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Ekstra</a></div>
                <div class="breadcrumb-item">Pengaturan</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Gambaran</h2>
            <p class="section-lead">
                Atur dan sesuaikan semua pengaturan tentang situs ini.
            </p>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="card-body">
                            <h4>Umum</h4>
                            <p>Penagturan umum seperti, judul situs, deskripsi situs, alamat dan sebagainya.</p>
                            <a href="{{ route('setting.general') }}" class="card-cta">
                                Atur
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-stopwatch"></i>
                        </div>
                        <div class="card-body">
                            <h4>Otomatisasi</h4>
                            <p>Pengaturan tentang otomatisasi seperti tugas cron, otomatisasi pencadangan, dan
                                sebagainya.</p>
                            <a href="{{ route('setting.automation') }}" class="card-cta text-primary">
                                Atur
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
