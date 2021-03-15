<x-app-layout :title="$title">
    <x-layouts.table x-data="DataTable.table(student)" x-init="init()">
        <x-slot name="actions">
            <div class="ml-2">
                <a type="button" x-on:click="create"
                    class="flex justify-start px-3 py-2 text-sm text-white bg-indigo-600 border-indigo-600 rounded cursor-pointer border-1">
                    <x-icons.circle-plus class="w-4 mr-1" /> Tambah
                </a>
                <x-layouts.modal x-show="open" x-on:keydown.window.escape="open = false" x-exit="open = false">
                    <form class="px-3">
                        <h2 class="mb-2 font-extrabold leading-9 text-center text-gray-800 uppercase" x-ref="title">
                        </h2>
                        <div class="mb-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Kode Level') }}
                            </label>
                            <input autocomplete="off" x-model="model.code"
                                class="block w-full px-4 py-3 mb-2 border rounded appearance-none bg-grey-lighter text-grey-darker @error('name') border-red-600 @enderror"
                                name="code" type="text" />
                        </div>
                        <div class="mb-3">
                            <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker">
                                {{ __('Nama Level') }}
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
                        <template x-if="isStore">
                            <button x-on:click="store" type="button"
                                class="w-full py-3 text-sm text-white bg-indigo-600 rounded shadow focus:outline-none focus:ring-2 hover:bg-indigo-700">
                                Simpan
                            </button>
                        </template>
                        <template x-if="!isStore">
                            <button x-on:click="update" type="button"
                                class="w-full py-3 text-sm text-white bg-indigo-600 rounded shadow focus:outline-none focus:ring-2 hover:bg-indigo-700">
                                Ubah
                            </button>
                        </template>
                    </form>
                </x-layouts.modal>
            </div>
        </x-slot>

        <x-slot name="action">
            <button x-on:click="edit(item['id'])"
                class="p-2 text-sm text-white bg-indigo-600 rounded focus:outline-none focus:ring-2">
                <x-icons.edit class="w-4" />
            </button>
            <button x-on:click="remove(item['id'])"
                class="p-2 text-sm text-white bg-red-600 rounded focus:outline-none focus:ring-2">
                <x-icons.trash class="w-4" />
            </button>
        </x-slot>
    </x-layouts.table>
    <x-slot name="javascript">
        <script type="text/javascript">
            const student = {
                open: false,
                isStore: false,
                isRemoveable: false,
                heading: 'Tabel Kelas',
                endpoint: "/levels/list",
                sorted: {
                    key: "code",
                    rule: "asc",
                },
                columns: [{
                        key: 'id',
                        visibility: 'hidden',
                    },
                    {
                        key: 'code',
                        text: 'Kode Level',
                        sortable: true,
                    },
                    {
                        key: 'name',
                        text: 'Nama Level',
                        sortable: true,
                    },
                    {
                        key: 'description',
                        text: 'Keterangan',
                        sortable: false,
                    },
                    {
                        key: 'action',
                        text: 'Aksi',
                        sortable: false,
                    }
                ],
                id: null,
                model: {
                    code: null,
                    name: null,
                    description: null,
                },
                create: function() {
                    Helper.setNull(this.model);
                    this.open = true;
                    this.isStore = true;

                    this.$refs.title.textContent = 'Tambah Level';
                },
                store: async function() {
                    try {
                        const response = await axios.post("/levels/store", this.model);
                        this.open = false;
                        Helper.setNull(this.model);
                        this.get();

                        Notify.notif({
                            type: "success",
                            title: "Berhasil",
                            message: "Data level berhasil ditambah"
                        });

                    } catch (e) {
                        console.error(e);
                    }
                },
                edit: async function(id) {
                    this.id = id;
                    this.$refs.title.textContent = 'Ubah Level';


                    try {
                        const response = await axios.get(`/levels/edit/${this.id}`);

                        const {
                            code,
                            name,
                            description
                        } = response.data.data;

                        this.model = {
                            code: code,
                            name: name,
                            description: description
                        };

                        this.open = true;
                        this.isStore = false;
                    } catch (e) {
                        console.error(e);
                    }
                },
                update: async function() {
                    try {
                        const response = await axios.post(`/levels/update/${this.id}`, this.model);
                        this.open = false;
                        Helper.setNull(this.model);
                        this.get();
                        Notify.notif({
                            type: "success",
                            title: "Berhasil",
                            message: "Data level berhasil diubah"
                        });
                    } catch (e) {
                        console.error(e);
                    }
                },
                remove: function(id) {
                    this.isRemoveable = true;
                },
            };

        </script>
    </x-slot>
</x-app-layout>
