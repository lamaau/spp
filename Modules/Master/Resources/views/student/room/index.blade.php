<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="{{ route('master.student.index') }}">Siswa</a></div>
                <div class="breadcrumb-item">Atur Kelas</div>
            </div>
        </div>
    </section>

    <div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <livewire:first-move-room-datatable :rooms="$rooms" />
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <livewire:second-move-room-datatable :rooms="$rooms" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
