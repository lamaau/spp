<?php

namespace Modules\Master\Datatables;

use App\Datatables\Column;
use Modules\Master\Entities\Room;
use App\Datatables\TableComponent;
use App\Datatables\Traits\HtmlComponents;
use App\Traits\Notify;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Event;
use Modules\Master\Http\Requests\RoomRequest;

class RoomDatatable extends TableComponent
{
    use HtmlComponents, Notify;

    /** @var string */
    public $title = 'Daftar Kelas';
    public $optionComponentView = 'master::room.table-component';

    /** @var string */
    public $name = '';
    public $code = '';
    public $description = '';

    public function query(): Builder
    {
        return Room::query();
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
                    return $this->html($model->description ?? '-');
                }),
            Column::make('tanggal', 'created_at')
                ->sortable()
                ->searchable()
                ->format(function (Room $model) {
                    return $this->html(date('F d, Y', strtotime($model->created_at)));
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

    /**
     * Save new rooms
     *
     * @return Event
     */
    public function save(): Event
    {
        $request = new RoomRequest();
        $validated = $this->validate($request->rules(), [], $request->attributes());

        if (resolve(\Modules\Master\Repository\RoomRepository::class)->save($validated)) {
            $this->resetValue();
            return $this->success('Yosh..', 'Kelas berhasil ditambahkan.');
        }

        return $this->error('Oopss..', 'Maaf, terjadi kesalahan.');
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
}
