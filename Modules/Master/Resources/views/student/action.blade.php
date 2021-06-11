<a href="{{ route('master.student.edit', ['id' => $model->id]) }}" class="btn btn-warning">
    <i class="fad fa-pencil-alt"></i>
</a>
<button type="button" wire:click.prevent='openModalStatus("{{ $model->id }}")' class="btn btn-info">
    <i class="fad fa-cog"></i>
</button>
<button type="button" wire:click.prevent='$emit("delete", "{{ $model->id }}")' class="btn btn-danger">
    <i class="fad fa-trash"></i>
</button>
