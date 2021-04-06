<thead>
    <tr>
        @if ($checkbox)
            <th
                class="w-4 p-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                <input type="checkbox" name="checkbox_all" class="border border-gray-300 rounded" wire:model="checkbox_all" />
            </th>
        @endif

        @foreach ($columns as $column)
            <th
                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200 {{ $column->attribute }}">
                @if ($column->sortable)
                    <span style="cursor: pointer;" wire:click="sort('{{ $column->attribute }}')">
                        {{ $column->heading }}
                        @if ($sorting['attribute'] == $column->attribute)
                            <i class="fa fa-sort-amount-{{ $sorting['direction'] == 'asc' ? 'up-alt' : 'down' }}"></i>
                        @else
                            <i class="fa fa-sort-amount-up-alt" style="opacity: .35;"></i>
                        @endif
                    </span>
                @else
                    {{ $column->heading }}
                @endif
            </th>
        @endforeach
    </tr>
</thead>
