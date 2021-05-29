<button wire:click.prevent='download("{{ $model->id }}")' type="button" class="btn btn-info">
    <i class="fa fa-download"></i>
</button>
<button wire:click.prevent='$emit("delete", "{{ $model->id }}")' type="button" class="btn btn-danger btn-delete">
    <i class="fa fa-trash"></i>
</button>
