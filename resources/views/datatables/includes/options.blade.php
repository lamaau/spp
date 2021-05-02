<div class="align-self-start">
    <div class="form-inline">
        <select wire:model='perPage' class="form-control">
            @foreach ($perPageOptions as $option)
                <option>{{ $option }}</option>
            @endforeach
        </select>

        <input placeholder="Cari disini..." type="search" name="search" wire:model.debounce.750ms='search'
            class="ml-2 form-control">

        @if ($loadingEnabled)
            <div wire:loading>
                <div class="ml-2 spinner-border spinner-border-sm"></div>
            </div>
        @endif

        @if ($leftTableComponent)
            @include($leftTableComponent)
        @endif
    </div>
</div>
<div class="ml-auto">
    @if ($rightTableComponent)
        @include($rightTableComponent)
    @endif
</div>
