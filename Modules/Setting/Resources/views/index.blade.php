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
                Atur dan sesuaikan semua pengaturan tentang aplikasi ini.
            </p>
            <div class="row">
                <div class="col-lg-6">
                    <x-card-icon
                        link-text="Atur"
                        title="Umum"
                        icon="fad fa-cog"
                        link-route="{{route('setting.general')}}"
                        description="Pengaturan umum seperti nama sekolah, kepala sekolah, alamat sekolah dan sebagainya."
                    />
                </div>
                <div class="col-lg-6">
                    <x-card-icon
                        link-text="Atur"
                        title="Hak Akses"
                        icon="fad fa-lock"
                        link-route="{{route('setting.role')}}"
                        description="Pengaturan hak akses seperti membuat pengguna baru dan role serta memberikan permission terhadap role."
                    />
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
