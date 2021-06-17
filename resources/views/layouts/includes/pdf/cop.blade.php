<div class="cop-container">
    <div class="cop-left">
        <img src="{{ asset("storage/$setting->logo") }}" class="logo" alt="Logo Sekolah">
    </div>
    <div class="cop-right">
        <h1 class="school-name">{{ $setting->name }}</h1>
        <div class="school-detail">
            <h4 style="text-transform: capitalize;">
                {{ $setting->address }}
            </h4>
            <h4>Tlp: {{ $setting->phone }} Fax: {{ $setting->fax }} Email: {{ $setting->email }}</h4>
        </div>
    </div>
</div>
<div class="line-1"></div>
