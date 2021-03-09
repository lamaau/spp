<x-app-layout title="Atur Aplikasi Anda">
    <div>
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600">
            </x-logo>
            <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
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
                            class="block w-full px-4 py-3 mb-3 border border-red-200 rounded appearance-none bg-grey-lighter text-grey-darker"
                            name="name" type="text">
                        <p class="text-xs italic text-red-500">
                            Please fill out this field.
                        </p>
                        </input>
                    </div>
                    <div class="px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Email Sekolah') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            name="email" type="text">
                        </input>
                    </div>
                </div>
                <div class="mb-6 -mx-3 md:flex">
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Telpon Sekolah') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                            name="phone" type="text" />
                    </div>
                    <div class="px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Fax') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            name="fax" type="text">
                        </input>
                    </div>
                </div>
                <div class="mb-6 -mx-3 md:flex">
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Kode Sekolah') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                            name="code" type="text" />
                    </div>
                    <div class="px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker"
                            for="grid-state">
                            {{ __('Derajat') }}
                        </label>
                        <select
                            class="block w-full px-4 py-3 pr-8 border rounded appearance-none bg-grey-lighter border-grey-lighter text-grey-darker"
                            name="level">
                            @foreach ($levels as $key => $level)
                                <option value="{{ $key }}">
                                    {{ $level }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-6 -mx-3 md:flex">
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Kepala Sekolah') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                            name="principal" type="text">
                        </input>
                    </div>
                    <div class="px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Nip') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            name="principal_number" type="text">
                        </input>
                    </div>
                </div>
                <div class="relative mb-6 -mx-3 md:flex" x-data="locations">
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <x-select label="provinsi">
                            <x-slot name="input">
                                <input @click="visible = !visible"
                                    class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                                    type="text" x-model="search" x-on:click="get()" />
                            </x-slot>
                            <x-slot name="container">
                                <div @click.away="visible = false"
                                    class="absolute overflow-auto bg-white border-b appearance-none my-select md:w-72 max-h-60 border-grey"
                                    x-show="visible">
                                    <ul class="flex flex-col list-reset">
                                        <template :key="index" x-for="(item, index) in filter()">
                                            <li class="relative block p-3 -mb-px border cursor-pointer border-grey hover:bg-gray-200"
                                                x-on:click="change(item)">
                                                <span class="font-bold" x-text="item.name">
                                                </span>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </x-slot>
                        </x-select>
                    </div>
                </div>
                <div class="mb-6 -mx-3 md:flex">
                    <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Kecamatan') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red"
                            name="district" type="text" />
                    </div>
                    <div class="px-3 md:w-1/2">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Kelurahan') }}
                        </label>
                        <input
                            class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            name="sub_district" type="text">
                        </input>
                    </div>
                </div>
                <div class="mb-6 md:flex">
                    <div class="md:w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                            {{ __('Detail Alamat') }}
                        </label>
                        <textarea
                            class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                            name="detail_address">
                        </textarea>
                    </div>
                </div>
                <div class="mb-6 md:flex">
                    <div class="md:w-full">
                        <button class="w-full p-2 text-white bg-gray-900 rounded shadow" type="submit">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="javascript">
        <script type="text/javascript">
            const persist = async (key, url) => {
                let location = JSON.parse(window.localStorage.getItem(key));

                if (!location) {
                    const response = await fetch(`api/v1/${url}`, {
                        headers: {
                            "Accept": "application/json",
                            "Content-Type": "application/json"
                        }
                    });
                    const results = await response.json();
                    window.localStorage.setItem(key, JSON.stringify(results));
                    location = results;
                }

                return location;
            };

            const locations = {
                items: [],
                search: "",
                visible: false,
                change: function(item) {
                    this.search = item.name
                    this.visible = false;
                },
                get: async function() {
                    this.items = await persist("provinces", "provinces");
                },
                filter: function() {
                    return this.items.filter((item) => {
                        return item.name.includes(this.search.toUpperCase());
                    });
                }
            }

        </script>
    </x-slot>
</x-app-layout>
