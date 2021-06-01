<?php

namespace Modules\Master\Datatables;

use Livewire\Event;
use App\Datatables\Column;
use Livewire\WithFileUploads;
use App\Datatables\Traits\Notify;
use App\Datatables\TableComponent;
use App\Jobs\ConvertWithImportJob;
use App\Datatables\Traits\Listeners;
use Illuminate\Support\Facades\Auth;
use Modules\Master\Entities\Student;
use Modules\Document\Entities\Document;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;
use Modules\Master\Constants\SexConstant;
use Modules\Master\Constants\ReligionConstant;
use Modules\Master\Imports\StudentImport;

class StudentDatatable extends TableComponent
{
    use WithFileUploads,
        HtmlComponents,
        Listeners,
        Notify;

    /** @var null|object */
    public $file = null;

    /** @var bool|string right table component */
    public $cardHeaderAction = 'master::student.component';

    /**
     * Upload and import
     *
     * @return Event
     */
    public function upload(): Event
    {
        $this->validate([
            'file' => ['required', 'max:1024', 'mimes:ods,xls,xlsx'],
        ]);

        $filename = $this->file->storeAs(
            'uploads/imports',
            generate_document_name($this->file->getClientOriginalExtension(), 'document_original', 'uploads/imports')
        );

        $data = [
            'filename' => $filename,
            'model' => "\Modules\Master\Entities\Student",
            'created_by' => Auth::id(),
        ];

        try {
            $document = Document::create($data);

            /** convert and import */
            ConvertWithImportJob::dispatch($document, new StudentImport($document));

            $this->emit('import:complete');
            return $this->success('Berhasil!', 'Dokumen berhasil diupload.');
        } catch (\Throwable $e) {
            return $this->error('Oops.', $e->getMessage());
        }
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
                    return 'process import beb!';
                }),
            Column::make('aksi')->format(function (Student $model) {
                return view('master::student.action', ['model' => $model]);
            })
        ];
    }
}
