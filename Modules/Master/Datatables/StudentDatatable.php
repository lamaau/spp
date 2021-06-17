<?php

namespace Modules\Master\Datatables;

use Livewire\Event;
use App\Datatables\Column;
use Livewire\WithFileUploads;
use App\Datatables\Traits\Notify;
use App\Datatables\TableComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Master\Entities\Student;
use App\Datatables\Traits\DocumentImport;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;
use Modules\Master\Constants\SexConstant;
use App\Datatables\Traits\DocumentListeners;
use Modules\Master\Constants\StudentConstant;
use Modules\Master\Constants\ReligionConstant;

class StudentDatatable extends TableComponent
{
    use DocumentListeners,
        WithFileUploads,
        HtmlComponents,
        DocumentImport,
        Notify;

    public $items;
        
    /** @var string|null */
    public $status;
    public $query;

    /** filter in card header form */
    public int $filter = StudentConstant::ACTIVE;

    /** @var bool|string right table component */
    public string $formatFile = 'format-siswa.ods';
    public $cardHeaderAction = 'master::student.component';
    public $cardHeaderForm = 'master::student.card-header-form';

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
     * Change status modal
     *
     * @param string $id
     * @return Event
     */
    public function openModalStatus(string $id): Event
    {
        $this->query = Student::query()->whereId($id)->first();
        $this->status = $this->query->status;
        
        return $this->emit('modal:toggle');
    }

    public function updatedFilter()
    {
        $this->resetPage();
    }
    
    public function update()
    {
        $validated = $this->validate([
            'status' => ['required'],
        ]);

        $this->query->update($validated);
        $this->status = null;
        return $this->success('Berhasil!', 'Status siswa telah diubah.');
    }

    /**
     * Delete student
     *
     * @param string $id
     * @return Event
     */
    public function delete(string $id, string $password): Event
    {
        if (Hash::check($password, Auth::user()->password)) {
            if (resolve(\Modules\Master\Repository\StudentRepository::class)->delete($id)) {
                return $this->success('Berhasil!', 'Siswa berhasil dihapus.');
            }

            return $this->error('Oopss!', 'Maaf, terjadi kesalahan.');
        }

        return $this->error('', 'Password yang anda masukan salah.');
    }

    public function query(): Builder
    {
        return Student::query()->where('status', $this->filter)->with('room');
    }

    public function columns(): array
    {
        return [
            Column::make('No')->rowIndex(),
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
