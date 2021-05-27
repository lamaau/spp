<div>
    <button type="button" data-target="add" class="btn btn-primary">
        <i class="fas fa-plus-circle"></i>
    </button>

    <x-modals.modal id="add" title="Tambah Pengeluaran">
        <form>
            <x-slot name="body">
                {{--  --}}
            </x-slot>
        </form>
    </x-modals.modal>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(() => {
            // 
        });

    </script>
@endpush
