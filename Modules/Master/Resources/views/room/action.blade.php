<div>
    <button type="button" wire:click.prevent='edit("{{ $model->id }}")' class="btn btn-warning">
        <i class="fa fa-pencil-alt"></i>
    </button>
    <button type="button" wire:click.prevent='$emit("delete", "{{ $model->id }}")' class="btn btn-danger">
        <i class="fa fa-trash"></i>
    </button>
</div>
