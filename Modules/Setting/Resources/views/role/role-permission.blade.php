<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('setting.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Ekstra</a></div>
                <div class="breadcrumb-item"><a href="{{ route('setting.index') }}">Pengaturan</a></div>
                <div class="breadcrumb-item">Umum</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('setting.operator') }}" class="btn btn-primary mb-3">
                        Kelola Pengguna
                    </a>
                </div>
                <div class="col-md-8">
                    <livewire:role-table />
                </div>
                <div class="col-md-4">
                    <livewire:role-form />
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
