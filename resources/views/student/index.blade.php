<x-app-layout :title="$title">
    <x-layouts.table x-data="DataTable.table(student)" x-init="init()">
        <x-slot name="actions">
            <div class="ml-2">
                <a href="{{ route('student.create') }}"
                    class="flex justify-start px-3 py-2 text-sm text-white bg-indigo-600 border-indigo-600 rounded border-1">
                    <x-icons.circle-plus class="w-4 mr-1" /> Tambah
                </a>
            </div>
            <div class="ml-2" x-data="Components.modal(importer)">
                <a type="button" x-on:click="open = true;"
                    class="flex justify-start px-3 py-2 text-sm text-white bg-indigo-600 border-indigo-600 rounded cursor-pointer border-1">
                    <x-icons.upload class="w-4 mr-1" /> Import
                </a>
                <x-layouts.modal x-show="open">
                    <form x-on:submit.prevent="upload" enctype="multipart/form-data">
                        <div x-show="!file.type">
                            <label
                                class="flex flex-col items-center w-64 px-4 py-6 tracking-wide text-indigo-600 transition bg-white border border-gray-200 rounded cursor-pointer hover:bg-gray-200 hover:text-indigo-800">
                                <x-icons.upload-cloud class="w-8" />
                                <span class="mt-2 font-medium">Pilih File</span>
                                <input type="file" name="document" class="hidden" x-on:change="choose" />
                            </label>
                        </div>
                        <template x-if="error.file">
                            <span class="my-3 text-xs text-red-600" x-text="error.file[0]"></span>
                        </template>

                        <template x-if="file.type && ['xlsx', 'xls', 'ods'].includes(file.type.toLowerCase())">
                            <div
                                class="relative flex flex-col items-center w-64 px-4 py-6 tracking-wide text-gray-700 transition bg-white border rounded">
                                <span x-on:click="remove()"
                                    class="absolute flex items-center justify-center w-6 h-6 bg-gray-200 rounded-full cursor-pointer top-3 right-3">
                                    <x-icons.times class="w-4 text-red-500" />
                                </span>
                                <x-icons.excel class="w-20" />
                                <span class="mt-4 text-xs text-center" x-text="`${file.name}.${file.type}`"></span>
                            </div>
                        </template>

                        <div class="w-full mt-2">
                            <button type="submit" x-bind:disabled="!state"
                                x-bind:class="{ state : '', 'cursor-not-allowed' : !(state) }"
                                class="w-full py-2 text-sm text-white bg-indigo-700 rounded-sm focus:ring-2 focus:outline-none">
                                Upload
                            </button>
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
                heading: 'Tabel Siswa',
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
            };

            const importer = {
                state: false,
                error: [],
                files: [],
                file: {
                    name: null,
                    type: null,
                },
                remove: function() {
                    this.files = [];
                    this.state = false;
                    window.Helper.setNull(this.file);
                },
                choose: function(event) {
                    if (!event || !event.target || !event.target.files) {
                        return;
                    }

                    this.files = event.target.files[0];

                    const {
                        name,
                        type,
                        size
                    } = this.files;

                    const index = name.lastIndexOf(".");
                    const ext = name.substring(index + 1);

                    const valid = ["xlsx", "xls", "ods"].includes(
                        ext.toLowerCase()
                    );

                    if (!valid) {
                        this.error = {
                            file: ["Hanya file xlsx dan xls yang boleh diupload"],
                        };
                        this.remove();
                        return;
                    }

                    this.file.name = name.substring(0, index);
                    this.file.type = name.substring(index + 1);
                    this.state = true;
                    this.error = [];
                },
                upload: function() {
                    let form = new FormData();
                    const config = {
                        headers: {
                            "Content-Type": "multipart/form-data",
                        },
                    };

                    form.append("file", this.files);

                    axios
                        .post("/import/students", form, config)
                        .then((response) => {
                            console.log(response);
                        })
                        .catch((error) => {
                            if (error.response.status === 422) {
                                this.error = error.response.data.errors;
                            }
                        })
                        .then(() => {
                            this.remove();
                            this.open = false;
                        });
                },
            };

        </script>
    </x-slot>
</x-app-layout>
