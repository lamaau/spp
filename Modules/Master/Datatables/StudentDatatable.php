<?php

namespace Modules\Master\Datatables;

use Livewire\Event;
use App\Datatables\Column;
use Livewire\WithFileUploads;
use App\Datatables\Traits\Notify;
use App\Datatables\TableComponent;
use App\Datatables\Traits\DocumentImport;
use Modules\Master\Entities\Student;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;
use Modules\Master\Constants\SexConstant;
use App\Datatables\Traits\DocumentListeners;
use Modules\Master\Constants\ReligionConstant;

class StudentDatatable extends TableComponent
{
    use DocumentListeners,
        WithFileUploads,
        HtmlComponents,
        DocumentImport,
        Notify;

    /** @var null|object */
    public $file = null;

    /** @var bool|string right table component */
    public $cardHeaderAction = 'master::student.component';
    public string $formatFile = 'format-siswa.ods';

    /**
     * Get model
     *
     * @return string
     */
    public function getModel(): string
    {
        return '\Modules\Master\Entities\Student';
    }

    /**
     * Delete student
     *
     * @param string $id
     * @return Event
     */
    public function delete(string $id): Event
    {
        if (resolve(\Modules\Master\Repository\StudentRepository::class)->delete($id)) {
            return $this->success('Berhasil!', 'Siswa telah dihapus.');
        }

        return $this->error('Oopss!', 'Maaf, terjadi kesalahan.');
    }

    public function query(): Builder
    {
        return Student::query()->with('room');
    }

    public function columns(): array
    {
        return [
            Column::make('nama', 'name')
                ->sortable()
                ->searchable(),
            Column::make('nis')
                ->sortable()
                ->searchable()
                ->format(function ($model) {
                    return $model->nis ?? '-';
                }),
            Column::make('nisn')
                ->sortable()
                ->searchable()
                ->format(function ($model) {
                    return $model->nisn ?? '-';
                }),
            Column::make('jk', 'sex')
                ->sortable()
                ->searchable()
                ->format(function (Student $model) {
                    return SexConstant::label($model->sex);
                }),
            Column::make('agama', 'religion')
                ->sortable()
                ->searchable()
                ->format(function (Student $model) {
                    return ReligionConstant::label($model->religion);
                }),
            Column::make('kelas', 'room_id')
                ->searchable()
                ->sortable()
                ->format(function (Student $model) {
                    return $model->room->name;
                }),
            Column::make('aksi')->format(function (Student $model) {
                return view('master::student.action', ['model' => $model]);
            })
        ];
    }
}
