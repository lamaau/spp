<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('master.student.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="{{ route('master.student.index') }}">Siswa</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>
    </section>
    
    <livewire:student-form :sexuals="$sexuals" :religions="$religions" :rooms="$rooms" :student="$student" />
</x-app-layout>
