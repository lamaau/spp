<div x-data="create" x-init="init">
    <button type="button" x-on:click="open = true"
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
            <div class="flex flex-col justify-center space-y-2 text-gray-800">
                <div>
                    <label class="text-xs" for="code">Kode Kelas</label>
                    <input type="text" wire:model="code" name="code" id="code"
                        class="w-full mt-1 rounded @error('code') border-red-500 @enderror" />
                    @error('code')
                        <small class="text-red-500 text-2xs">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label class="text-xs" for="name">Nama Kelas</label>
                    <input type="text" wire:model="name" name="name" id="name"
                        class="w-full mt-1 rounded @error('name') border-red-500 @enderror">
                    @error('name')
                        <small class="text-red-500 text-2xs">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label class="text-xs" for="description">Keterangan</label>
                    <textarea name="description" wire:model="description" id="description"
                        class="w-full mt-1 rounded @error('description') border-red-500 @enderror"></textarea>
                    @error('description')
                        <small class="text-red-500 text-2xs">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <button type="button" wire:click.prevent='save'
                        class="w-full py-2 text-xs text-white bg-indigo-500 rounded focus:ring-2 focus:ring-indigo-300 focus:outline-none">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </x-modal>
</div>

<div x-data="alert" x-init="init">
    <x-layouts.alert x-state="open" />
</div>

@push('scripts')
    <script type="text/javascript">
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

        const create = {
            open: false,
            init: function() {
                Livewire.on('notice', (response) => {
                    Helper.notice({
                        type: response.type,
                        title: response.title,
                        message: response.message,
                    })

                    this.open = false;
                });
            },
        };

    </script>
@endpush
