<div>
    <button type="button" wire:click.prevent='edit("{{ $model->id }}")' class="btn btn-warning">
        <i class="fad fa-pencil-alt"></i>
    </button>
    <button type="button" wire:click.prevent='$emit("delete", "{{ $model->id }}")' class="btn btn-danger">
        <i class="fad fa-trash"></i>
    </button>
</div>
