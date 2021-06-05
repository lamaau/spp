<div>
    <button type="button" wire:click.prevent="create" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Tambah
    </button>

    <x-modals.modal id="createOrEdit" title="Tambah Pengeluaran">
        <form>
            <x-slot name="body">
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="spending_date"
                        class="datepicker"
                        wire:model.defer='spending_date'
                        label="tanggal pengeluaran"
                    />
                </div>
                <div class="form-group">
                    <x-inputs.select-two
                        required
                        name="bill_id"
                        :items="$bills"
                        label="Tagihan"
                        wire:model.defer="bill_id"
                    />
                </div>
                <div class="form-group">
                    <x-inputs.text
                        required
                        name="name"
                        label="nama"
                        wire:model.defer='name'
                    />
                </div>
                <div class="form-group">
                    <x-inputs.number
                        required
                        name="nominal"
                        label="nominal"
                        wire:model.defer='nominal'
                    />
                </div>
                <div class="form-group" wire:ignore>
                    <label class="text-capitalize">Keterangan</label>
                    <textarea class="summernote-simple" name='description' style="display: none;"></textarea>
                </div>
            </x-slot>
            <x-slot name="footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">
                    Tutup
                </button>
                @if (is_null($pid))
                    <button wire:click.prevent='save' class="btn btn-primary">
                        Simpan
                    </button>
                @else
                    <button wire:click.prevent="update" class="btn btn-primary">
                        Ubah
                    </button>
                @endif
            </x-slot>
        </form>
    </x-modals.modal>

    @push('styles')
        <style type="text/css">
            .note-editor.note-frame {
                border: 1px solid #e4e6fc;
            }
        </style>
    @endpush

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                Livewire.on("modal:toggle", (txt) => {
                    if (txt !== undefined) {
                        $('.summernote-simple').summernote('code', txt);
                    } else {
                        $('.summernote-simple').summernote('code', '');
                    }

                    $('#createOrEdit').modal('toggle');
                });

                Livewire.on('notify', () => {
                    $('#createOrEdit').modal('hide');
                    $('.summernote-simple').summernote('reset');
                });

                $(".summernote-simple").summernote({
                    dialogsInBody: true,
                    minHeight: 80,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough']],
                        ['para', ['paragraph']]
                    ],
                    callbacks: {
                        onChange: function(description, $editable) {
                            @this.set('description', description);
                        }
                    }
                });

                $('#spending_date').on('change', (e) => {
                    @this.set('spending_date', e.target.value);
                });

                Livewire.on('delete', (id) => {
                    CustomDeleteSwall({
                        title: "Apakah anda yakin?",
                        message: "Semua data yang berhubungan dengan data ini akan dihapus",
                    }, (event) => {
                        if (event.isConfirmed) {
                            @this.call('delete', id, event.value);
                        }
                    });
                });

                Livewire.hook('message.processed', (message, component) => {
                    customSelect('#bill_id', {
                        allowClear: false,
                        placeholder: "",
                    }, (e) => {
                        @this.set('bill_id', e.target.value);
                    });
                });
            });
        </script>
    @endpush
</div>