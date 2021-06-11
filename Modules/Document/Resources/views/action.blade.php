<button wire:click.prevent='download("{{ $model->id }}")' type="button" class="btn btn-info">
    <i class="fad fa-download"></i>
</button>
<button wire:click.prevent='$emit("delete", "{{ $model->id }}")' type="button" class="btn btn-danger btn-delete">
    <i class="fad fa-trash"></i>
</button>
