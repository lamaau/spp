<div>
    <a href="{{ route('master.student.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i>
    </a>
    <div class="dropdown d-inline mr-2">
        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cog"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-start">
            <a class="dropdown-item" href="#">Kenaikan Kelas</a>
            <a class="dropdown-item" href="#">Perpindahan Kelas</a>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            Livewire.on('edit', (id) => {
                alert(id);
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
        });

    </script>
@endpush
