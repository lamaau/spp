<x-app-layout :title="$title">
    <x-layouts.table x-data="DataTable.table({...LevelDataTable, ...CrudOperation})" x-init="init()">
        <x-slot name="actions">
            <div class="ml-2">
                <button type="button" x-on:click="create"
                    class="flex justify-start px-3 py-2 text-sm text-white bg-indigo-600 border-indigo-600 rounded cursor-pointer focus:outline-none border-1 focus:ring-2">
                    <x-icons.circle-plus class="w-4 mt-0.5 mr-1" /> Tambah
                </button>
                <x-layouts.modal x-show="state.isModal" x-close="state.isModal = false">
                    <form class="px-3">
                        <x-inputs.input label="kode level" error="errors.code" x-model="model.code" />
                        <x-inputs.input label="nama level" error="errors.name" x-model="model.name" />
                        <x-inputs.textarea label="keterangan" error="errors.description" x-model="model.description" />

                        <x-buttons.submit x-show="state.isCreate" x-action="store" x-text="Simpan"
                            x-loading="actionLoading" />
                        <x-buttons.submit x-show="!state.isCreate" x-action="update" x-text="Ubah"
                            x-loading="actionLoading" />
                    </form>
                </x-layouts.modal>

                <x-layouts.dialog x-show="state.isDialog" x-close="state.isDialog = false"
                    x-title="Yakin ingin menghapus level?" x-action="remove" x-loading="actionLoading"
                    x-description="Level yang telah dihapus tidak dapat dikembalikan" />
            </div>
        </x-slot>
        <x-slot name="action">
            <button x-on:click="edit(item['id'])"
                class="p-2 text-sm text-white bg-indigo-600 rounded focus:outline-none focus:ring-2">
                <x-icons.edit class="w-4" x-show="!state.isLoading[item['id']]" />
                <x-icons.loading class="w-4" stroke="white" x-show="state.isLoading[item['id']]" />
            </button>
            <button x-on:click="dialog(item['id'])"
                class="p-2 text-sm text-white bg-red-600 rounded focus:outline-none focus:ring-2">
                <x-icons.trash class="w-4" />
            </button>
        </x-slot>
    </x-layouts.table>
    <x-slot name="javascript">
        <script type="text/javascript">
            const LevelDataTable = {
                url: "/levels/list",
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
                        width: '8rem'
                    },
                    {
                        key: 'name',
                        text: 'Nama Level',
                        sortable: true,
                        width: '8rem'
                    },
                    {
                        key: 'description',
                        text: 'Keterangan',
                        sortable: false,
                        width: '12rem'
                    },
                    {
                        key: 'action',
                        text: 'Aksi',
                        sortable: false,
                    }
                ]
            };

            const CrudOperation = {
                model: {
                    code: null,
                    name: null,
                    description: null,
                },
                state: {
                    isModal: false,
                    isCreate: false,
                    isDialog: false,
                    isLoading: [],
                },
                errors: [],
                actionLoading: false,
                create: function() {
                    this.errors = [];
                    Helper.setNull(this.model);
                    this.state.isCreate = true;
                    this.state.isModal = true;
                },
                store: async function() {
                    try {
                        this.actionLoading = true;
                        const response = await axios.post("/levels/store", this.model);

                        if (response.status === 200) {

                            const {
                                message
                            } = response.data;

                            Notify.notice({
                                type: "success",
                                title: "Berhasil",
                                message: message
                            });

                            this.errors = [];
                            this.reloadTable();
                            Helper.setNull(this.model);
                            this.state.isModal = false;
                        }
                    } catch (e) {
                        const {
                            errors
                        } = e.response.data;

                        this.errors = errors;
                    } finally {
                        this.actionLoading = false;
                    }
                },
                edit: async function(id) {
                    this.id = id;
                    this.errors = [];
                    this.state.isCreate = false;

                    try {
                        this.state.isLoading[id] = true;
                        const response = await axios.get(`/levels/edit/${this.id}`);

                        if (response.status === 200) {
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

                            this.state.isModal = true;
                        }
                    } catch (e) {
                        console.error(e);
                    } finally {
                        this.state.isLoading[id] = false;
                    }
                },
                update: async function() {
                    try {
                        this.actionLoading = true;

                        const response = await axios.post(`/levels/update/${this.id}`, this.model);

                        if (response.status === 200) {
                            const {
                                message
                            } = response.data;

                            Notify.notice({
                                type: "success",
                                title: "Berhasil",
                                message: message
                            });

                            this.errors = [];
                            this.reloadTable();
                            Helper.setNull(this.model);
                            this.state.isModal = false;
                        }

                    } catch (e) {
                        const {
                            errors
                        } = e.response.data;

                        this.errors = errors;
                    } finally {
                        this.actionLoading = false;
                    }
                },
                dialog: function(id) {
                    this.id = id;
                    this.state.isDialog = true;
                },
                remove: async function() {
                    try {
                        this.actionLoading = true;

                        const response = await axios.post("/levels/delete", {
                            id: this.id
                        });

                        const {
                            message
                        } = response.data;

                        Notify.notice({
                            type: "success",
                            title: "Berhasil",
                            message: message
                        });

                        this.reloadTable();

                    } catch (e) {
                        console.error(e);
                    } finally {
                        this.actionLoading = false;
                        this.state.isDialog = false;
                    }
                },
            };

        </script>
    </x-slot>
</x-app-layout>
