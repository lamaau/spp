<tr>
    @foreach ($columns as $column)
        @if ($column->isVisible())
            @if ($column->isSortable())
                <th class="{{ $this->setTableHeadClass($column->getAttribute()) }} w-4 p-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
                    id="{{ $this->setTableHeadId($column->getAttribute()) }}" @foreach ($this->setTableHeadAttributes($column->getAttribute()) as $key => $value) {{ $key }}="{{ $value }}" @endforeach
                    wire:click="sort('{{ $column->getAttribute() }}')" style="cursor:pointer;">
                    {{ $column->getText() }}

                    @if ($sortField !== $column->getAttribute())
                        {{ new \Illuminate\Support\HtmlString($sortDefaultIcon) }}
                    @elseif ($sortDirection === 'asc')
                        {{ new \Illuminate\Support\HtmlString($ascSortIcon) }}
                    @else
                        {{ new \Illuminate\Support\HtmlString($descSortIcon) }}
                    @endif
                </th>
            @else
                <th class="{{ $this->setTableHeadClass($column->getAttribute()) }} w-4 p-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
                    id="{{ $this->setTableHeadId($column->getAttribute()) }}" @foreach ($this->setTableHeadAttributes($column->getAttribute()) as $key => $value) {{ $key }}="{{ $value }}" @endforeach>
                    @if (strtolower($column->getText()) === 'checkbox')
                        @include('datatable::includes.checkbox-all')
                    @else
                        {{ $column->getText() }}
                    @endif
                </th>
            @endif
        @endif
    @endforeach
</tr>
