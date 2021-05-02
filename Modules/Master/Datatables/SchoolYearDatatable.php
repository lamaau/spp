<?php

namespace Modules\Master\Datatables;

use Livewire\Event;
use App\Datatables\Column;
use Livewire\WithFileUploads;
use App\Datatables\Traits\Notify;
use App\Datatables\TableComponent;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Master\Entities\SchoolYear;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;
use Modules\Master\Imports\SchoolYearImport;
use App\Datatables\Traits\WithUploadAndImport;
use Modules\Master\Http\Requests\SchoolYearRequest;

class SchoolYearDatatable extends TableComponent
{
    use WithUploadAndImport,
        WithFileUploads,
        HtmlComponents,
        Notify;

    /** @var string */
    public $pid;
    public $year = null;
    public $description = null;
    public $optionComponentView = 'master::school-year.table-component';

    /** @var string file upload and import */
    protected $importModel = SchoolYear::class;
    protected $fileUploadDestination = 'school-year';
    protected $fileFormatName = 'Format_Tahun_Ajaran.xlsx';

    /** @var object */
    public $query;
    protected $request;

    public function __construct(string $id = null)
    {
        parent::__construct($id);

        $this->request = new SchoolYearRequest;
    }

    public function query(): Builder
    {
        return SchoolYear::query();
    }

    public function columns(): array
    {
        return [
            Column::make('no')->rowIndex(),
            Column::make('tahun ajaran', 'year')
                ->searchable()
                ->sortable(),
            Column::make('keterangan', 'description')
                ->searchable()
                ->format(function (SchoolYear $model) {
                    return $model->description ?? '-';
                }),
            Column::make('tanggal', 'created_at')
                ->sortable()
                ->searchable()
                ->format(function (SchoolYear $model) {
                    return date('F d, Y', strtotime($model->created_at));
                }),
        ];
    }

    /**
     * Reset value
     *
     * @return void
     */
    public function resetValue(): void
    {
        $this->year = null;
        $this->description = null;
    }

    public function create(): Event
    {
        $this->resetValue();
        return $this->emit('create');
    }

    /**
     * Save new rooms
     *
     * @return Event
     */
    public function save(): Event
    {
        $validated = $this->validate($this->request->rules(), [], $this->request->attributes());

        if (resolve(\Modules\Master\Repository\SchoolYearRepository::class)->save($validated)) {
            $this->resetValue();
            return $this->success('Yosh..', 'Kelas berhasil ditambahkan.');
        }

        return $this->error('Oopss..', 'Maaf, terjadi kesalahan.');
    }

    public function edit(string $id): Event
    {
        $this->pid = $id;
        $this->query = $this->query()->where('id', $id)->first();

        $this->year = $this->query->year;
        $this->description = $this->query->description;

        return $this->emit('edit', $id);
    }

    public function update(): Event
    {
        $validated = $this->validate($this->request->rules($this->pid), [], $this->request->attributes());

        $this->query->update($validated);
        return $this->success('Yosh..', 'Kelas berhasil diubah.');
    }

    /**
     * Want to delete
     *
     * @param string $id
     * @return Event
     */
    public function destroy(string $id)
    {
        $this->dispatchBrowserEvent('delete-alert', [
            'id' => $id,
            'title' => 'Hapus Tahun Ajaran?',
            'message' => 'Menghapus data master membuat semua data yang berhubungan akan terhapus, data yang telah dihapus tidak dapat dikembalikan.'
        ]);
    }

    /**
     * Delete rooms
     *
     * @param string $id
     * @return Event
     */
    public function delete(string $id): Event
    {
        if (resolve(\Modules\Master\Repository\SchoolYearRepository::class)->delete($id)) {
            return $this->success('Yosh..', 'Kelas berhasil dihapus.');
        }

        return $this->error('Oopss..', 'Maaf, terjadi kesalahan.');
    }

    /**
     * Upload and import
     *
     * @return Event|\Illuminate\Support\MessageBag
     */
    public function import()
    {
        $uploaded = $this->upload();

        try {
            Excel::import(new SchoolYearImport, uploaded_path($uploaded->filename));

            $this->remove();
            return $this->success('Yosh..', 'Kelas berhasil diimport.');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            return $this->addError('file', $e->failures()[0]->errors()[0]);
        }
    }
}
