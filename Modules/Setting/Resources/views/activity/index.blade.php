<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('setting.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Log</a></div>
                <div class="breadcrumb-item">Aktifitas</div>
            </div>
        </div>
        
        @livewire('log-datatable')
    </section>
</x-app-layout>
