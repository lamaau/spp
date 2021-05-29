@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.on('delete', (id) => {
                swal({
                        title: 'Hapus data master?',
                        text: 'Dokumen ini akan dihapus dan tidak dapat dikembalikan!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            @this.call('delete', id);
                        }
                    });
            });
        });

    </script>
@endpush
