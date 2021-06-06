<div class="ml-2">
    <div wire:ignore style="width: 100px!important;">
        <x-inputs.select-constant name="filter" :items="\Modules\Master\Constants\StudentConstant::labels()"
            wire:model="filter" />
    </div>
</div>
