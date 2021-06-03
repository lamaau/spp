<?php

namespace Modules\Master\Datatables;

use Livewire\Event;
use App\Datatables\Column;
use Livewire\WithFileUploads;
use App\Datatables\Traits\Notify;
use Modules\Master\Entities\Room;
use App\Datatables\TableComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Datatables\Traits\DocumentImport;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;
use App\Datatables\Traits\DocumentListeners;
use Modules\Master\Http\Requests\RoomRequest;

class RoomDatatable extends TableComponent
{
    use DocumentListeners,
        WithFileUploads,
        HtmlComponents,
        DocumentImport,
        Notify;

    public $password;

    /** @var null|string|object */
    public $pid;
    public $name = null;
    public $description = null;

    /** @var bool|string table component */
    public $cardHeaderAction = 'master::room.component';
    public string $formatFile = 'format-kelas.ods';

    /** @var RoomRequest */
    protected object $request;

    public function __construct(string $id = null)
    {
        parent::__construct($id);

        $this->request = new RoomRequest;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel(): string
    {
        return '\Modules\Master\Entities\Room';
    }

    /**
     * Reset value
     *
     * @return void
     */
    public function resetValue(): void
    {
        $this->pid = null;
        $this->name = null;
        $this->description = null;
    }

    /**
     * Create modal
     *
     * @return Event
     */
    public function create(): Event
    {
        $this->resetValue();
        return $this->emit('modal:toggle');
    }

    /**
     * Save room
     *
     * @return Event
     */
    public function save(): Event
    {
        $validated = $this->validate($this->request->rules(), [], $this->request->attributes());

        if (resolve(\Modules\Master\Repository\RoomRepository::class)->save($validated)) {
            $this->resetValue();
            $this->emit('modal:toggle');
            return $this->success('Berhasil!', 'Kelas berhasil ditambahkan.');
        }

        return $this->error('Oopss!', 'Maaf, terjadi kesalahan.');
    }

    /**
     * Edit room
     *
     * @param string $id
     * @return Event
     */
    public function edit(string $id): Event
    {
        $this->pid = $id;
        $query = $this->query()->where('id', $this->pid)->first();
        $this->name = $query->name;
        $this->description = $query->description;

        return $this->emit('modal:toggle');
    }

    /**
     * Update room
     *
     * @param string $id
     * @return Event
     */
    public function update(): Event
    {
        $validated = $this->validate($this->request->rules($this->pid), [], $this->request->attributes());
        $this->query()->where('id', $this->pid)->first()->update($validated);
        $this->resetValue();
        $this->emit('modal:toggle');
        return $this->success('Berhasil!', 'Kelas berhasil diubah.');
    }

    /**
     * Delete room
     *
     * @param string $id
     * @param string $password
     * @return Event
     */
    public function delete(string $id, string $password): Event
    {
        if (Hash::check($password, Auth::user()->password)) {
            if (resolve(\Modules\Master\Repository\RoomRepository::class)->delete($id)) {
                return $this->success('Berhasil!', 'Kelas berhasil dihapus.');
            }

            return $this->error('Oopss!', 'Maaf, terjadi kesalahan.');
        }

        return $this->error('', 'Password yang anda masukan salah.');
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
                    return format_date($model->created_at);
                }),
            Column::make('aksi')
                ->format(function (Room $model) {
                    return view('master::room.action', ['model' => $model]);
                })
        ];
    }
}
