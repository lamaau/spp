<?php

namespace Modules\Master\Datatables;

use App\DataTables\Column;
use Modules\Master\Entities\Room;
use App\DataTables\TableComponent;
use App\DataTables\Traits\Checkbox;
use Illuminate\Contracts\Support\Renderable;

class RoomDataTable extends TableComponent
{
    use Checkbox;

    public $checkbox = true;

    public function render(): Renderable
    {
        return $this->tableView();
    }

    public function tableView(): Renderable
    {
        return view('master::room.datatables.table', [
            'columns' => $this->columns(),
            'sorting' => $this->sorting(),
            'models'  => $this->models()->paginate($this->per_page),
        ]);
    }

    public function query(): object
    {
        return Room::query();
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make('Nama Kelas'),
            Column::make('Kode Kelas'),
            Column::make('Keterangan'),
            Column::make('Aksi')
        ];
    }

    public function search($models)
    {
        $models->whereLike([
            'name',
        ], $this->search);
    }
}
