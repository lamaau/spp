<?php

namespace Modules\Master\Datatables;

use Livewire\Event;
use App\Datatables\Column;
use Livewire\WithFileUploads;
use App\Datatables\Traits\Notify;
use Modules\Master\Entities\Room;
use App\Datatables\TableComponent;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Master\Imports\RoomImport;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;
use Modules\Master\Http\Requests\RoomRequest;
use App\Datatables\Traits\WithUploadAndImport;

class RoomDatatable extends TableComponent
{
    use WithUploadAndImport,
        WithFileUploads,
        HtmlComponents,
        Notify;

    /** @var string */
    public $pid;
    public $query;
    public $name = null;
    public $description = null;

    /** @var string right table component */
    public $rightTableComponent = 'master::room.component';

    /** @var string file upload and import */
    protected $importModel = Room::class;
    protected $fileUploadDestination = 'rooms';
    protected $fileFormatName = 'Format_Kelas.xlsx';

    /** @var RoomRequest */
    protected $request;

    public function __construct(string $id = null)
    {
        parent::__construct($id);

        $this->request = new RoomRequest;
    }

    public function query(): Builder
    {
        return Room::query()->withCount('students');
    }

    public function columns(): array
    {
        return [
            Column::make('no')->rowIndex(),
            Column::make('nama', 'name')
                ->searchable()
                ->sortable(),
            Column::make('keterangan', 'description')
                ->searchable()
                ->format(function (Room $model) {
                    return $model->description ?? '-';
                }),
            Column::make('jumlah siswa', 'students_count')
                ->sortable()
                ->format(function (Room $model) {
                    return $model->students_count;
                }),
            Column::make('tanggal', 'created_at')
                ->sortable()
                ->searchable()
                ->format(function (Room $model) {
                    return date('F d, Y', strtotime($model->created_at));
                }),
            Column::make('aksi')
                ->format(function (Room $model) {
                    return view('master::room.action', ['model' => $model]);
                })
        ];
    }

    /**
     * Reset value
     *
     * @return void
     */
    public function resetValue(): void
    {
        $this->name = null;
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

        if (resolve(\Modules\Master\Repository\RoomRepository::class)->save($validated)) {
            $this->resetValue();
            return $this->success('Berhasil!', 'Kelas berhasil ditambahkan.');
        }

        return $this->error('Oopss!', 'Maaf, terjadi kesalahan.');
    }

    public function edit(string $id): Event
    {
        $this->pid = $id;
        $this->query = $this->query()->where('id', $id)->first();

        $this->name = $this->query->name;
        $this->description = $this->query->description;

        return $this->emit('edit', $id);
    }

    public function update(): Event
    {
        $validated = $this->validate($this->request->rules($this->pid), [], $this->request->attributes());
        $this->query->update($validated);
        return $this->success('Berhasil!', 'Kelas berhasil diubah.');
    }

    /**
     * Delete rooms
     *
     * @param string $id
     * @return Event
     */
    public function delete(string $id): Event
    {
        if (resolve(\Modules\Master\Repository\RoomRepository::class)->delete($id)) {
            return $this->success('Berhasil!', 'Kelas berhasil dihapus.');
        }

        return $this->error('Oopss!', 'Maaf, terjadi kesalahan.');
    }

    public $test;

    /**
     * Get import class
     *
     * @return Event|\Illuminate\Support\MessageBag
     */
    public function import()
    {
        $uploaded = $this->upload();

        try {
            Excel::import(new RoomImport, uploaded_path($uploaded->filename));

            $this->remove();
            return $this->success('Berhasil!', 'Kelas berhasil diimport.');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            return $this->addError('file', $e->failures()[0]->errors()[0]);
        }
    }
}
