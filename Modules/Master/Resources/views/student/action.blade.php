<a href="{{ route('master.student.edit', ['id' => $model->id]) }}" class="btn btn-warning">
    <i class="fa fa-pencil-alt"></i>
</a>
<button type="button" wire:click.prevent='$emit("delete", "{{ $model->id }}")' class="btn btn-danger">
    <i class="fa fa-trash"></i>
</button>
