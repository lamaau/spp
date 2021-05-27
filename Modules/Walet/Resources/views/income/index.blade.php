<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Keuangan</a></div>
                <div class="breadcrumb-item">Pemasukan</div>
            </div>
        </div>
        <div class="row">
            @foreach ($bills as $item)
                <x-widget
                    type="success"
                    :title="$item->name"
                    :value="idr($item->nominal)"
                    icon="fas fa-fire"
                />
            @endforeach
        </div>
    </section>
</x-app-layout>
