<?php

namespace Modules\Master\Datatables;

use App\Datatables\Column;
use Modules\Master\Entities\Room;
use App\Datatables\TableComponent;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;

class RoomDatatable extends TableComponent
{
    use HtmlComponents;

    public function query(): Builder
    {
        return Room::query();
    }

    public function columns(): array
    {
        return [
            Column::make('#', 'id')
                ->sortable(),
            Column::make('Nama Kelas', 'name')
                ->searchable()
                ->sortable(),
            Column::make('Kode Kelas', 'code')
                ->searchable()
                ->sortable(),
            Column::make('Keterangan', 'description')
                ->searchable()
                ->format(function (Room $model) {
                    return $this->html($model->description ?? '-');
                }),
            Column::make('Actions')
                ->format(function (Room $model) {
                    return view('master::room.datatables.action', ['room' => $model]);
                })
        ];
    }
}
