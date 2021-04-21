<?php

namespace Modules\Master\Datatables;

use App\Datatables\Column;
use App\Datatables\Traits\Notify;
use App\Datatables\TableComponent;
use Modules\Master\Entities\Student;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;
use Modules\Master\Constants\StudentConstant;
use Modules\Master\Constants\ReligionConstant;

class StudentDatatable extends TableComponent
{
    use HtmlComponents,
        Notify;

    /** @var string */
    public $optionComponentView = 'master::student.table-component';

    public function query(): Builder
    {
        return Student::query()->with('room');
    }

    public function columns(): array
    {
        return [
            Column::make('no')->rowIndex(),
            Column::make('nama', 'name')->sortable()->searchable(),
            Column::make('nisn')->sortable()->searchable(),
            Column::make('email')->sortable()->searchable(),
            Column::make('nomor hp', 'phone')->sortable()->searchable(),
            Column::make('agama', 'religion')->sortable()->searchable()->format(function (Student $model) {
                return ReligionConstant::label($model->religion);
            }),
            Column::make('status')->sortable()->format(function (Student $model) {
                return StudentConstant::label($model->status);
            }),
            Column::make('kelas', 'room_id')->format(function (Student $model) {
                return $model->room->name;
            }),
            Column::make('aksi')->format(function (Student $model) {
                return view('master::student.action', ['model' => $model]);
            })
        ];
    }
}
