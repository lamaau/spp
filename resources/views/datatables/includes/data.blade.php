@foreach($models as $index => $model)
    <tr
        class="{{ $this->setTableRowClass($model) }}"
        id="{{ $this->setTableRowId($model) }}"
        @foreach ($this->setTableRowAttributes($model) as $key => $value)
            {{ $key }}="{{ $value }}"
        @endforeach
        @if ($this->getTableRowUrl($model))
            onclick="window.location='{{ $this->getTableRowUrl($model) }}';"
            style="cursor:pointer"
        @endif
    >
        @foreach($columns as $column)
            <td
                class="{{ $this->setTableDataClass($column->getAttribute(), data_get($model, $column->getAttribute())) }} px-4 py-4 text-sm bg-white border-b border-gray-200"
                id="{{ $this->setTableDataId($column->getAttribute(), data_get($model, $column->getAttribute())) }}"
                @foreach ($this->setTableDataAttributes($column->getAttribute(), data_get($model, $column->getAttribute())) as $key => $value)
                {{ $key }}="{{ $value }}"
                @endforeach
            >
                @if ($column->isFormatted())
                    @if ($column->isRaw())
                        {!! $column->formatted($model, $column) !!}
                    @else
                        {{ $column->formatted($model, $column) }}
                    @endif
                @else
                    @if ($column->rowIndex)
                        {{++$index}}
                    @endif

                    @includeWhen(strtolower($column->getAttribute()) === 'checkbox', 'datatable::includes.checkbox-row', ['model' => $model])
                    
                    @if ($column->isRaw())
                        {!! data_get($model, $column->getAttribute()) !!}
                    @else
                        {{ data_get($model, $column->getAttribute()) }}
                    @endif
                @endif
            </td>
        @endforeach
    </tr>
@endforeach