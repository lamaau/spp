<div wire:ignore.self class="modal fade" tabindex="-1" id="{{ $id }}" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form>
            <div class="modal-content">
                @if (isset($header))
                    <div class="modal-header">
                        {{ $header }}
                    </div>
                @else
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="modal-body">
                    {{ $body }}
                </div>
                @if (isset($footer))
                    <div class="modal-footer bg-whitesmoke">
                        {{ $footer }}
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>
