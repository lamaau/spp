<?php

namespace Modules\Master\Datatables;

use Livewire\Event;
use App\Datatables\Column;
use Livewire\WithFileUploads;
use App\Datatables\Traits\Notify;
use Modules\Master\Entities\Room;
use App\Datatables\TableComponent;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Master\Entities\RoomFile;
use Modules\Master\Imports\RoomImport;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;
use Modules\Master\Http\Requests\RoomRequest;
use App\Datatables\Traits\WithUploadAndImport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
    public $code = null;
    public $description = null;
    public $optionComponentView = 'master::room.table-component';

    /** @var string file upload */
    protected $fileUploadDestination = 'rooms';

    /** @var object */
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
            Column::make('kode kelas', 'code')
                ->searchable()
                ->sortable(),
            Column::make('nama kelas', 'name')
                ->searchable()
                ->sortable(),
            Column::make('keterangan', 'description')
                ->searchable()
                ->format(function (Room $model) {
                    return $model->description ?? '-';
                }),
            Column::make('siswa', 'id')
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
        $this->code = null;
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
            return $this->success('Yosh..', 'Kelas berhasil ditambahkan.');
        }

        return $this->error('Oopss..', 'Maaf, terjadi kesalahan.');
    }

    public function edit(string $id): Event
    {
        $this->pid = $id;
        $this->query = $this->query()->where('id', $id)->first();

        $this->code = $this->query->code;
        $this->name = $this->query->name;
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
    public function destroy(string $id): Event
    {
        return $this->emit('delete', $id);
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
            return $this->success('Yosh..', 'Kelas berhasil dihapus.');
        }

        return $this->error('Oopss..', 'Maaf, terjadi kesalahan.');
    }

    /**
     * Upload and import
     * -----------------------------------------------
     */

    /**
     * Download format
     *
     * @return BinaryFileResponse
     */
    public function downloadFormat(): BinaryFileResponse
    {
        return response()->download(config('format.path') . '/room.xlsx');
    }

    /**
     * Get import model
     *
     * @return RoomFile
     */
    public function getImportModel(): RoomFile
    {
        return new RoomFile;
    }

    /**
     * Get import class
     *
     * @return Event
     */
    public function import(object $uploaded): Event
    {
        $file = storage_path('/../public/storage/' . $uploaded->filename);
        Excel::queueImport(new RoomImport($uploaded), $file);

        return $this->emit('complete');
    }
}
