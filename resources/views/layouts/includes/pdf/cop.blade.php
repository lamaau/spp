<div class="cop-container">
    <div class="cop-left">
        <img src="{{ asset("storage/$setting->logo") }}" class="logo" alt="Logo Sekolah">
    </div>
    <div class="cop-right">
        <h1 class="school-name">{{ $setting->name }}</h1>
        <div class="school-detail">
            <h4 style="text-transform: capitalize;">
                {{strtolower(\Regional::findProvince($setting->province)['name'])}},
                {{strtolower(\Regional::findCity($setting->city)['name'])}},
                {{strtolower(\Regional::findDistrict($setting->district)['name'])}},
                {{strtolower(\Regional::findSubDistrict($setting->subdistrict)['name'])}},
                {{ $setting->address }}
            </h4>
            <h4>Tlp: {{ $setting->phone }} Fax: {{ $setting->fax }} Email: {{ $setting->email }}</h4>
        </div>
    </div>
</div>
<div class="line-1"></div>
