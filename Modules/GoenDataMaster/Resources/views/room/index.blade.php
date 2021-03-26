<x-app-layout :title="$title">
    <x-layouts.table x-data="DataTable.table({...LevelDataTable, ...CrudOperation})" x-init="
        init()
        selectInit()
    ">
        <x-slot name="actions">
            <div class="ml-2">
                <button type="button" x-on:click="create"
                    class="flex justify-start px-3 py-2 text-sm text-white bg-indigo-600 border-indigo-600 rounded cursor-pointer focus:outline-none border-1 focus:ring-2">
                    <x-icons.circle-plus class="w-4 mt-0.5 mr-1" /> Tambah
                </button>
                <x-layouts.modal x-show="state.isModal" x-close="state.isModal = false">
                    <form class="px-3">
                        <x-inputs.select2 x-ref="level" label="level kelas" x-options="options" x-state="isOpen"
                            error="errors.level_id" x-model="model.level_id" />
                        <x-inputs.input label="kode kelas" error="errors.code" x-model="model.code" />
                        <x-inputs.input label="nama kelas" error="errors.name" x-model="model.name" />
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
                url: "/rooms/list",
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
                        text: 'Kode Kelas',
                        sortable: true,
                        width: '8rem'
                    },
                    {
                        key: 'name',
                        text: 'Nama Kelas',
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
                    level_id: null,
                    description: null,
                },
                state: {
                    isModal: false,
                    isCreate: false,
                    isDialog: false,
                    isLoading: [],
                },
                options: [],
                errors: [],
                isOpen: false,
                loading: false,
                placeholder: 'Pilih',
                actionLoading: false,
                selected: {
                    id: null,
                    name: null,
                },
                getLevel: async function(keyword = '') {
                    const response = await axios.get(
                        `levels/list?per_page=10&page=1&sortby=name&sortbykey=asc&keyword=${keyword}`
                    );
                    return response.data.data;
                },
                selectInit: async function() {
                    this.options = await this.getLevel();

                    this.$watch('model.level_id', async (value) => {
                        this.options = await this.getLevel(value);
                    });
                },
                choose: function(item) {
                    const element = this.$refs.level;
                    element.setAttribute('value', item.id)
                    this.isOpen = false;
                },
                create: function() {
                    this.errors = [];
                    Helper.setNull(this.model);
                    this.state.isCreate = true;
                    this.state.isModal = true;
                },
                store: async function() {
                    try {
                        this.actionLoading = true;
                        const response = await axios.post("/rooms/store", this.model);

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
            };

        </script>
    </x-slot>
</x-app-layout>
