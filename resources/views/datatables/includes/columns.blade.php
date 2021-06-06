<tr>
    @foreach ($columns as $column)
        @if ($column->isSortable())
            <th class="{{ $this->setTableHeadClass($column->getAttribute()) }} text-uppercase"
                id="{{ $this->setTableHeadId($column->getAttribute()) }}" @foreach ($this->setTableHeadAttributes($column->getAttribute()) as $key => $value) {{ $key }}="{{ $value }}" @endforeach
                wire:click="sort('{{ $column->getAttribute() }}')"
                style="cursor:pointer; background-color: #fff;border-bottom:1px solid #f6f6f6;">
                {{ $column->getText() }}

                <span style="float: right;">
                    @if ($sortField !== $column->getAttribute())
                        {{ new \Illuminate\Support\HtmlString($sortDefaultIcon) }}
                    @elseif ($sortDirection === 'asc')
                        {{ new \Illuminate\Support\HtmlString($ascSortIcon) }}
                    @else
                        {{ new \Illuminate\Support\HtmlString($descSortIcon) }}
                    @endif
                </span>
            </th>
        @else
            <th class="{{ $this->setTableHeadClass($column->getAttribute()) }} text-uppercase"
                id="{{ $this->setTableHeadId($column->getAttribute()) }}" @foreach ($this->setTableHeadAttributes($column->getAttribute()) as $key => $value) {{ $key }}="{{ $value }}" @endforeach
                style="background-color: #fff;border-bottom:1px solid #f6f6f6; {{ strtolower($column->getText()) === 'checkbox' ? 'width: 1em;' : 'cursor: pointer;' }}">
                @if (strtolower($column->getText()) === 'checkbox')
                    @include('datatable::includes.checkbox-all')
                @else
                    {{ $column->getText() }}
                @endif
            </th>
        @endif
    @endforeach
</tr>
