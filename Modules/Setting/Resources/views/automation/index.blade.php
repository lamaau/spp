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
                <div class="breadcrumb-item">Otomatisasi</div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-6">
            <livewire:mail-setting />
        </div>
        <div class="col-6">
            <livewire:pusher-setting />
        </div>
    </div>
</x-app-layout>