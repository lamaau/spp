<x-auth-layout title="Atur Aplikasi Anda">
    @section('content')
        <div>
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <x-icons.logo class="w-24 mx-auto" fill="#2d3748" />
                <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-800">
                    {{ __('Atur Aplikasi Anda') }}
                </h2>
            </div>
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-2xl">
                <form action="{{ route('store.install') }}"
                    class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow" method="post">
                    @csrf
                    <div class="mb-6 -mx-3 md:flex">
                        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Nama Sekolah') }}
                            </label>
                            <input
                                class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker @error('name') border-red-600 @enderror"
                                name="name" type="text">
                            @error('name')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                            </input>
                        </div>
                        <div class="px-3 md:w-1/2">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Email Sekolah') }}
                            </label>
                            <input
                                class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker @error('email') border-red-600 @enderror"
                                name="email" type="text">
                            @error('email')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                            </input>
                        </div>
                    </div>
                    <div class="mb-6 -mx-3 md:flex">
                        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Telpon Sekolah') }}
                            </label>
                            <input
                                class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker @error('phone') border-red-600 @enderror"
                                name="phone" type="text">
                            @error('phone')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                            </input>
                        </div>
                        <div class="px-3 md:w-1/2">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Fax') }}
                            </label>
                            <input
                                class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker @error('fax') border-red-600 @enderror"
                                name="fax" type="text">
                            @error('fax')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                            </input>
                        </div>
                    </div>
                    <div class="mb-6 -mx-3 md:flex">
                        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Kode Sekolah') }}
                            </label>
                            <input
                                class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker @error('code') border-red-600 @enderror"
                                name="code" type="text">
                            @error('code')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                            </input>
                        </div>
                        <div class="px-3 md:w-1/2" x-data="{
                                open: false,
                                loading: false,
                                placeholder: 'Pilih',
                                selected: {
                                    id: null,
                                    text: null,
                                },
                                levels: [
                                    {id: 1, text: 'Sekolah Dasar'},
                                    {id: 2, text: 'Sekolah Menengah'},
                                    {id: 3, text: 'Sekolah Menengah Atas'}
                                ],
                                choose: function(item) {
                                    this.$refs.level.setAttribute('value', item.id)
                                    this.selected = item;
                                    this.open = false;
                                } 
                            }">
                            <x-inputs.select
                                class="mb-2 {{ $errors->has('level') ? 'border-red-600' : 'border-gray-500' }}"
                                select-label="tingkat" select-loading-state="loading" select-name="level"
                                select-container-state="open" select-state="open = !open"
                                select-container-click-away="open = false"
                                select-value="selected.text !== null ? selected.text : placeholder">
                                <template x-for="(item, index) in levels" x-key="index">
                                    <li x-on:click="choose(item)" x-bind:class="{ 'bg-gray-300' : selected.id === item.id }"
                                        class="flex justify-between p-2 hover:bg-gray-200">
                                        <span x-text="item.text"></span>
                                        <template x-if="selected.id === item.id">
                                            <x-icons.check />
                                        </template>
                                    </li>
                                </template>
                            </x-inputs.select>
                            @error('level')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-6 -mx-3 md:flex">
                        <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Kepala Sekolah') }}
                            </label>
                            <input
                                class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker @error('principal') border-red-600 @enderror"
                                name="principal" type="text">
                            @error('principal')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                            </input>
                        </div>
                        <div class="px-3 md:w-1/2">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Nip') }}
                            </label>
                            <input
                                class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker @error('principal') border-red-600 @enderror"
                                name="principal_number" type="text">
                            @error('principal_number')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                            </input>
                        </div>
                    </div>
                    <div x-data="Location.territory()" x-init="init()">
                        <div class="mb-6 -mx-3 md:flex">
                            <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                                {{-- province --}}
                                <x-inputs.select
                                    class="mb-2 {{ $errors->has('city') ? 'border-red-600' : 'border-gray-500' }}"
                                    select-label="provinsi" select-loading-state="loading.province" select-name="province"
                                    select-container-state="state.province" select-state="state.province = !state.province"
                                    select-container-click-away="state.province = false"
                                    select-value="selected.province !== null ? selected.province.name : placeholder">
                                    <template x-for="(item, index) in provinces" x-key="index">
                                        <li x-on:click="changeProvince(item)"
                                            x-bind:class="{ 'bg-gray-300' : selected.province !== null && selected.province.id === item.id }"
                                            class="flex justify-between p-2 hover:bg-gray-200">
                                            <span x-text="item.name"></span>
                                            <template x-if="selected.province !== null && selected.province.id === item.id">
                                                <x-icons.check />
                                            </template>
                                        </li>
                                    </template>
                                </x-inputs.select>
                                @error('province')
                                    <p class="text-xs italic text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                                {{-- city --}}
                                <x-inputs.select
                                    class="mb-2 {{ $errors->has('city') ? 'border-red-600' : 'border-gray-500' }}"
                                    select-label="kabupaten" select-loading-state="loading.city"
                                    select-container-state="state.city" select-state="state.city = !state.city"
                                    select-name="city" select-container-click-away="state.city = false"
                                    select-value="selected.city !== null ? selected.city.name : placeholder">
                                    <template x-for="(item, index) in cities" x-key="index">
                                        <li x-on:click="changeCity(item)"
                                            x-bind:class="{ 'bg-gray-300' : selected.city !== null && selected.city.id === item.id }"
                                            class="flex justify-between p-2 hover:bg-gray-200">
                                            <span x-text="item.name"></span>
                                            <template x-if="selected.city !== null && selected.city.id === item.id">
                                                <x-icons.check />
                                            </template>
                                        </li>
                                    </template>
                                </x-inputs.select>
                                @error('city')
                                    <p class="text-xs italic text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-6 -mx-3 md:flex">
                            <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                                {{-- district --}}
                                <x-inputs.select
                                    class="mb-2 {{ $errors->has('district') ? 'border-red-600' : 'border-gray-500' }}"
                                    select-label="kecamatan" select-loading-state="loading.district"
                                    select-container-state="state.district" select-state="state.district = !state.district"
                                    select-name="district" select-container-click-away="state.district = false"
                                    select-value="selected.district !== null ? selected.district.name : placeholder">
                                    <template x-for="(item, index) in districts" x-key="index">
                                        <li x-on:click="changeDistrict(item)"
                                            x-bind:class="{ 'bg-gray-300' : selected.district !== null && selected.district.id === item.id }"
                                            class="flex justify-between p-2 hover:bg-gray-200">
                                            <span x-text="item.name"></span>
                                            <template x-if="selected.district !== null && selected.district.id === item.id">
                                                <x-icons.check />
                                            </template>
                                        </li>
                                    </template>
                                </x-inputs.select>
                                @error('district')
                                    <p class="text-xs italic text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                                {{-- sub districts --}}
                                <x-inputs.select
                                    class="mb-2 {{ $errors->has('sub_district') ? 'border-red-600' : 'border-gray-500' }}"
                                    select-label="kelurahan" select-loading-state="loading.sub_district"
                                    select-container-state="state.sub_district"
                                    select-state="state.sub_district = !state.sub_district" select-name="sub_district"
                                    select-container-click-away="state.sub_district = false"
                                    select-value="selected.sub_district !== null ? selected.sub_district.name : placeholder">
                                    <template x-for="(item, index) in subDistricts" x-key="index">
                                        <li x-on:click="changeSubdistrict(item)"
                                            x-bind:class="{ 'bg-gray-300' : selected.sub_district !== null && selected.sub_district.id === item.id }"
                                            class="flex justify-between p-2 hover:bg-gray-200">
                                            <span x-text="item.name"></span>
                                            <template
                                                x-if="selected.sub_district !== null && selected.sub_district.id === item.id">
                                                <x-icons.check />
                                            </template>
                                        </li>
                                    </template>
                                </x-inputs.select>
                                @error('sub_district')
                                    <p class="text-xs italic text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 md:flex">
                        <div class="md:w-full">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Detail Alamat') }}
                            </label>
                            <textarea
                                class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker @error('detail_address') border-red-600 @enderror"
                                name="detail_address"></textarea>
                            @error('detail_address')
                                <p class="text-xs italic text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-6 md:flex">
                        <div class="md:w-full">
                            <button class="w-full py-3 text-white bg-gray-800 rounded shadow" type="submit">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
</x-auth-layout>
