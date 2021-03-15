<x-app-layout :title="$title">
    <x-layouts.table x-data="DataTable.table(student)" x-init="init()">
        <x-slot name="actions">
            <div class="ml-2">
                <a type="button" x-on:click="open = true;"
                    class="flex justify-start px-3 py-2 text-sm text-white bg-indigo-600 border-indigo-600 rounded cursor-pointer border-1">
                    <x-icons.circle-plus class="w-4 mr-1" /> Tambah
                </a>
                <x-layouts.modal x-show="open">
                    <form x-on:submit.prevent="submit" class="px-3">
                        <h2 class="mb-2 font-extrabold leading-9 text-center text-gray-800 uppercase">Tambah Kelas</h2>
                        <div class="mb-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Kode Kelas') }}
                            </label>
                            <input autocomplete="off" x-model="model.code"
                                class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker @error('name') border-red-600 @enderror"
                                name="code" type="text" />
                        </div>
                        <div class="mb-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Nama Kelas') }}
                            </label>
                            <input autocomplete="off" x-model="model.name"
                                class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker @error('name') border-red-600 @enderror"
                                name="name" type="text" />
                        </div>
                        <div class="mb-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Keterangan') }}
                            </label>
                            <textarea x-model="model.description"
                                class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker @error('name') border-red-600 @enderror"
                                name="description" type="text"></textarea>
                        </div>
                        <div>
                            <button
                                class="w-full py-3 text-sm text-white bg-indigo-600 rounded shadow focus:outline-none focus:ring-2 hover:bg-indigo-700">Tambah</button>
                        </div>
                    </form>
                </x-layouts.modal>
            </div>
        </x-slot>
        <x-slot name="action">
            <button class="p-2 text-sm text-white bg-indigo-600 rounded focus:outline-none focus:ring-2">
                <x-icons.edit class="w-4" />
            </button>
            <button class="p-2 text-sm text-white bg-red-600 rounded focus:outline-none focus:ring-2">
                <x-icons.trash class="w-4" />
            </button>
        </x-slot>
    </x-layouts.table>
    <x-slot name="javascript">
        <script type="text/javascript">
            const student = {
                open: false,
                heading: 'Tabel Kelas',
                endpoint: "/students/list",
                columns: [{
                        key: 'name',
                        text: 'Nama',
                        sortable: true,
                    },
                    {
                        key: 'email',
                        text: 'Email',
                        sortable: true,
                    },
                    {
                        key: 'nisn',
                        text: 'nisn',
                        sortable: true,
                    },
                    {
                        key: 'action',
                        text: 'Aksi',
                        sortable: false,
                    }
                ],
                model: {
                    code: null,
                    name: null,
                    description: null,
                },
                submit: async function() {
                    try {
                        const response = await axios.post("/rooms/store", this.model);
                        this.open = false;
                    } catch (e) {
                        console.error(e);
                    }
                }
            };

        </script>
    </x-slot>
</x-app-layout>
