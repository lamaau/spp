<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('setting.role') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Ekstra</a></div>
                <div class="breadcrumb-item"><a href="{{ route('setting.index') }}">Pengaturan</a></div>
                <div class="breadcrumb-item"><a href="{{ route('setting.role') }}">Hak Akses</a></div>
                <div class="breadcrumb-item">Operator</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @livewire('operator-datatable', ['roles' => $roles])
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
