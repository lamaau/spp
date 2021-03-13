<x-app-layout :title="$title">
    <div x-data="modal">
        <button x-on:click="open = true" href="#"
            class="px-4 py-2 text-sm font-medium tracking-wide text-white bg-indigo-700 rounded shadow focus:ring-2 focus:outline-none">
            Import
        </button>

        <x-layouts.modal x-show="open">
            <form x-on:submit.prevent="upload" enctype="multipart/form-data">
                <div x-show="!file.type">
                    <label
                        class="flex flex-col items-center w-64 px-4 py-6 tracking-wide text-indigo-600 transition bg-white border border-gray-200 rounded cursor-pointer hover:bg-gray-200 hover:text-indigo-800">
                        <x-icons.upload class="w-8" />
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

    <x-slot name="javascript">
        <script type="text/javascript">
            const modal = {
                open: false,
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

                    const index = name.lastIndexOf('.');
                    const ext = name.substring(index + 1);

                    const valid = ['xlsx', 'xls', 'ods'].includes(ext.toLowerCase());

                    if (!valid) {
                        this.error = {
                            file: ['Hanya file xlsx dan xls yang boleh diupload']
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
                            "Content-Type": "multipart/form-data"
                        },
                    };

                    form.append('file', this.files);

                    axios.post("/import/students", form, config)
                        .then((response) => {
                            console.log(response);
                        }).catch((error) => {
                            if (error.response.status === 422) {
                                this.error = error.response.data.errors;
                            }
                        })
                        .then(() => {
                            this.remove();
                            this.open = false;
                        })
                }
            };

        </script>
    </x-slot>
</x-app-layout>
