<div>
    <button type="button" data-target="add" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i> Tambah
    </button>

    <x-modals.modal id="addOrEdit" title="Tambah Pengeluaran">
        <form>
            <x-slot name="body">
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
                <button data-dismiss="modal" class="btn btn-secondary">Tutup</button>
                @if (!is_null($pid))
                    <button wire:click.prevent='update' class="btn btn-primary">Ubah</button>
                @else
                    <button wire:click.prevent='add' class="btn btn-primary">Tambah</button>
                @endif
            </x-slot>
        </form>
    </x-modals.modal>

    @push('styles')
        <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/summernote/summernote-bs4.css">
        <style type="text/css">
            .note-editor.note-frame {
                border: 1px solid #e4e6fc;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
        <script type="text/javascript">
            $('button[data-target="add"]').on('click', () => {
                @this.call('create');
            });

            $('button[data-target="edit"]').on('click', (e) => {
                @this.call('edit', e.currentTarget.getAttribute('data-id'));
            });

            Livewire.on("modal-toggle", (txt) => {
                if (txt !== undefined) {
                    $('.summernote-simple').summernote('code', txt);
                } else {
                    $('.summernote-simple').summernote('code', '');
                }
                
                $('#addOrEdit').modal('toggle');
            });

            Livewire.on('notify', () => {
                $('#addOrEdit').modal('hide');
                $('.summernote-simple').summernote('reset');
            });
            
            $(".summernote-simple").summernote({
                dialogsInBody: true,
                minHeight: 150,
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

            $('.btn-delete').on('click', (e) => {
                swal({
                    title: 'Hapus data master?',
                    text: 'Semua data yang berhubungan dengan data ini akan dihapus!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        @this.call('delete', e.currentTarget.getAttribute('data-id'));
                    }
                });
            });

        </script>
    @endpush
</div>