<?php

namespace Modules\Setting\Datatables;

use App\Datatables\Column;
use App\Entities\Activity;
use App\Datatables\TableComponent;
use Illuminate\Database\Eloquent\Builder;

class LogDatatable extends TableComponent
{
    public function query(): Builder
    {
        return Activity::query();
    }

    public function columns(): array
    {
        return [
            Column::make('subject')
                ->searchable()
                ->sortable(),
            Column::make('detail')
                ->searchable()
                ->sortable()
                ->format(function (Activity $model) {
                    return $model->detail;
                }),
            Column::make('ip')
                ->searchable()
                ->sortable(),
            Column::make('agent')
                ->searchable()
                ->sortable(),
            Column::make('author')
                ->searchable()
                ->sortable()
                ->format(function (Activity $model) {
                    return $model->author->name;
                })
        ];
    }
}
