<x-app-layout :title="$title">
    @push('styles')
        <style>
            .dropdown-list-icon {
                flex-shrink: 0;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                line-height: 42px;
                text-align: center;
            }

        </style>
    @endpush

    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Notifikasi</div>
            </div>
        </div>

        <livewire:notifications />
    </section>
</x-app-layout>
