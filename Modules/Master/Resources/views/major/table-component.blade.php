<div class="flex space-x-2">
    <div x-data="createOrEdit" x-init="init">
        <button type="button" wire:click.prevent="create"
            class="flex items-center p-2 text-white bg-indigo-500 rounded focus:outline-none focus:ring-2 focus:ring-indigo-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="mr-1 feather feather-plus-circle">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="16"></line>
                <line x1="8" y1="12" x2="16" y2="12"></line>
            </svg>
            Tambah
        </button>

        <x-modal x-state="open">
            <form>
                <h2 class="mb-4 text-xl font-semibold leading-tight text-center text-gray-800" x-text="title"></h2>
                <div class="flex flex-col justify-center space-y-2 text-gray-800">
                    <div>
                        <label class="text-xs font-bold uppercase" for="year">Tahun Ajaran</label>
                        <input type="text" wire:model.defer="year" name="year" id="year"
                            class="w-full mt-1 rounded shadow @error('year') border border-red-500 @else border-none @enderror" />
                        @error('year')
                            <small class="text-red-500 text-2xs">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label class="text-xs font-bold uppercase" for="bill">Biaya Komite</label>
                        <input type="number" wire:model.defer="bill" name="bill" id="bill"
                            class="w-full mt-1 rounded shadow @error('bill') border border-red-500 @else border-none @enderror">
                        @error('bill')
                            <small class="text-red-500 text-2xs">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label class="text-xs font-bold uppercase" for="description">Keterangan</label>
                        <textarea name="description" wire:model.defer="description" id="description"
                            class="w-full mt-1 rounded shadow @error('name') border border-red-500 @else border-none @enderror"></textarea>
                        @error('description')
                            <small class="text-red-500 text-2xs">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <button type="button" wire:click.prevent='save' x-show="save"
                            class="w-full py-2 text-white bg-indigo-500 rounded text-ms focus:ring-2 focus:ring-indigo-300 focus:outline-none">
                            Simpan
                        </button>
                        <button type="button" wire:click.prevent='update' x-show="update"
                            class="w-full py-2 text-white bg-indigo-500 rounded text-ms focus:ring-2 focus:ring-indigo-300 focus:outline-none">
                            Ubah
                        </button>
                    </div>
                </div>
            </form>
        </x-modal>
    </div>
    <div x-data="cog" x-init="init">
        <div class="relative">
            <button type="button" x-on:click="dropdownOpen = !dropdownOpen"
                class="flex items-center p-2 text-white bg-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-gray-400">
                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path id="Stroke 1" fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 9.5C13.3809 9.5 14.5 10.6191 14.5 12C14.5 13.3809 13.3809 14.5 12 14.5C10.6191 14.5 9.5 13.3809 9.5 12C9.5 10.6191 10.6191 9.5 12 9.5Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path id="Stroke 3" fill-rule="evenodd" clip-rule="evenodd"
                        d="M20.168 7.25025V7.25025C19.4845 6.05799 17.9712 5.65004 16.7885 6.33852C15.7598 6.93613 14.4741 6.18838 14.4741 4.99218C14.4741 3.61619 13.3659 2.5 11.9998 2.5V2.5C10.6337 2.5 9.52546 3.61619 9.52546 4.99218C9.52546 6.18838 8.23977 6.93613 7.21199 6.33852C6.02829 5.65004 4.51507 6.05799 3.83153 7.25025C3.14896 8.4425 3.55399 9.96665 4.73769 10.6541C5.76546 11.2527 5.76546 12.7473 4.73769 13.3459C3.55399 14.0343 3.14896 15.5585 3.83153 16.7498C4.51507 17.942 6.02829 18.35 7.21101 17.6625H7.21199C8.23977 17.0639 9.52546 17.8116 9.52546 19.0078V19.0078C9.52546 20.3838 10.6337 21.5 11.9998 21.5V21.5C13.3659 21.5 14.4741 20.3838 14.4741 19.0078V19.0078C14.4741 17.8116 15.7598 17.0639 16.7885 17.6625C17.9712 18.35 19.4845 17.942 20.168 16.7498C20.8515 15.5585 20.4455 14.0343 19.2628 13.3459H19.2618C18.2341 12.7473 18.2341 11.2527 19.2628 10.6541C20.4455 9.96665 20.8515 8.4425 20.168 7.25025Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <div x-show="dropdownOpen" x-on:click.away="dropdownOpen = false"
                x-on:keydown.window.escape="dropdownOpen = false"
                class="absolute right-0 z-20 w-48 py-2 mt-2 bg-white rounded-md shadow-xl" style="display: none;">
                <a href="#" x-on:click.prevent="importOpen = true; dropdownOpen = false;"
                    class="block w-full px-4 py-2 text-sm text-left text-gray-700 capitalize hover:bg-indigo-500 hover:text-white">
                    Import
                </a>
                <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-indigo-500 hover:text-white">
                    Download Pdf
                </a>
                <a href="#"
                    class="block px-4 py-2 text-sm text-gray-700 capitalize hover:bg-indigo-500 hover:text-white">
                    Download Excel
                </a>
                <a href="#" wire:click.prevent="downloadFormat"
                    class="block w-full px-4 py-2 text-sm text-left text-gray-700 capitalize hover:bg-indigo-500 hover:text-white">
                    Download Format
                </a>
            </div>
        </div>
        <x-modal x-state="importOpen">
            <form class="flex flex-col space-y-3" enctype="multipart/form-data">
                <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">Import Tahun Ajaran</h2>
                <div>
                    <label
                        class="flex flex-col items-center w-64 px-4 py-6 text-gray-800 uppercase transition-all duration-300 bg-gray-100 border rounded-md cursor-pointer border-blue hover:bg-blue hover:text-white hover:bg-gray-800">
                        @if (is_null($file))
                            <div class="flex flex-col items-center">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 font-bold">Pilih file</span>
                            </div>
                        @else
                            <div class="flex flex-col items-center text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="w-8 h-8 feather feather-file-text">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                                <span class="mt-2 font-bold">{{ $file->getClientOriginalName() }}</span>
                            </div>
                        @endif
                        <input type='file' class="hidden" wire:model="file"
                            accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel"
                            x-ref="input" />
                    </label>
                    @error('file')
                        <small class="text-xs text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex flex-row space-x-2 text-xs text-white">
                    <button type="button" wire:click.prevent="remove"
                        class="w-full py-2 font-semibold bg-red-500 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                        Hapus
                    </button>
                    <button type="button" wire:click.prevent="upload"
                        class="w-full py-2 font-semibold bg-indigo-600 rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-500">
                        Upload
                    </button>
                </div>
            </form>
        </x-modal>
    </div>
</div>

<div x-data="alert" x-init="init">
    <x-layouts.alert x-state="open" />
</div>

@push('scripts')
    <script type="text/javascript">
        const cog = {
            file: null,
            fileName: null,
            fileModel: null,
            importOpen: false,
            dropdownOpen: false,
            init: function() {
                Livewire.on('complete', () => {
                    this.importOpen = false;
                });
            },
        };

        const alert = {
            id: '',
            open: false,
            init: function() {
                Livewire.on('notice', () => {
                    this.open = false;
                });

                Livewire.on('delete', (id) => {
                    this.id = id;
                    this.open = true;
                });
            },
            remove: function() {
                @this.call('delete', this.id);
            },
        }

        const createOrEdit = {
            title: '',
            open: false,
            save: false,
            update: false,
            init: function() {
                Livewire.on('create', () => {
                    this.title = 'Tambah Tahun Ajaran';
                    this.save = true;
                    this.update = false;
                    this.open = true;
                });

                Livewire.on('edit', () => {
                    this.title = 'Ubah Tahun Ajaran';
                    this.save = false;
                    this.update = true;
                    this.open = true;
                });

                Livewire.on('notice', (response) => {
                    Helper.notice({
                        type: response.type,
                        title: response.title,
                        message: response.message,
                    });

                    this.open = false;
                });
            },
        };

    </script>
@endpush
