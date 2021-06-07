@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.on('delete', (id) => {
                CustomDeleteSwall({
                    title: "Apakah anda yakin?",
                    message: "Dokumen ini akan dihapus secara permanen.",
                }, (event) => {
                    if (event.isConfirmed) {
                        @this.call('delete', id, event.value);
                    }
                });
            });
        });

    </script>
@endpush
