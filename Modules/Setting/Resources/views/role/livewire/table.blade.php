<div>
    <div class="card card-primary">
        <div class="card-header">
            <h4>Daftar Hak Akses</h4>
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th style="width: 20px;">No</th>
                        <th scope="col">Role</th>
                        <th style="width: 13em;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $i => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @if ($role->name !== 'Super Admin')
                                    <button wire:click.prevent="$emit('deleteRole', '{{ $role->id }}')"
                                        class="btn btn-sm btn-danger">
                                        <i class="fad fa-trash"></i>
                                    </button>
                                @endif
                                <button class="btn btn-sm btn-info" data-toggle="collapse"
                                    data-target="#table-detail-{{ $i }}">
                                    <i class="fad fa-eye"></i>
                                </button>
                                @if ($role->name !== 'Super Admin')
                                    <button class="btn btn-sm btn-warning" wire:click.prevent="edit('{{ $role->id }}')">
                                        <i class="fad fa-circle-notch fa-spiner" wire:loading></i><i class="fad fa-pencil" wire:loading.remove></i>
                                    </button> 
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12" class="hiddenRow">
                                <div class="collapse" id="table-detail-{{ $i }}" wire:ignore.self>
                                    <table class="table table-striped table-inner">
                                        <thead class="thead-dark">
                                            <tr class="info">
                                                <th style="width: 20px;">No</th>
                                                <th>Hak Akses</th>
                                                @if ($role->name !== 'Super Admin')
                                                    <th style="width: 13em;">Aksi</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($role->permissions as $k => $item)
                                                <tr>
                                                    <td>{{ ++$k }}</td>
                                                    <td>{{ $item->display_name }}</td>
                                                    @if ($role->name !== 'Super Admin')
                                                        <td>
                                                            <button
                                                                wire:click.prevent="$emit('deletePermission', '{{ $item->id }}')"
                                                                class="btn btn-sm btn-danger">
                                                                <i class="fad fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td align="center" colspan="3">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                Livewire.on('deleteRole', (id) => {
                    CustomDeleteSwall({
                        title: "Apakah anda yakin?",
                        message: "User yang menggunakan akun dihapus secara permanen",
                    }, (event) => {
                        if (event.isConfirmed) {
                            @this.call('deleteRole', id, event.value);
                        }
                    });
                });

                Livewire.on('deletePermission', (id) => {
                    CustomDeleteSwall({
                        title: "Apakah anda yakin?",
                        message: "Anda akan menghapus hak ases ini dari role ini",
                    }, (event) => {
                        if (event.isConfirmed) {
                            @this.call('deletePermission', id, event.value);
                        }
                    });
                });
            });

        </script>
    @endpush
</div>
