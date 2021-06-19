<x-app-layout :title="$title">
    <livewire:export />
    
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('report.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Ekstra</a></div>
                <div class="breadcrumb-item"><a href="{{ route('report.index') }}">Laporan</a></div>
                <div class="breadcrumb-item">Siswa</div>
            </div>
        </div>

        <div class="row">
            @foreach ($students as $index => $item)
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <x-widget
                        icon="fad fa-users"
                        :type="$item['type']"
                        :value="$item['total']"
                        :title="$item['status']"
                    />
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12">
                <livewire:student-chart />
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                {{-- <livewire:student-chart /> --}}
            </div>
        </div>
    </section>
</x-app-layout>
