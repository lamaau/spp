<?php

namespace Modules\Walet\Datatables;

use App\Datatables\Column;
use App\Datatables\Traits\Notify;
use App\Datatables\TableComponent;
use Modules\Walet\Entities\Spending;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Event;
use Modules\Master\Http\Requests\BillRequest;
use Modules\Walet\Http\Requests\SpendingRequest;

class SpendingDatatable extends TableComponent
{
    use HtmlComponents,
        Notify;

    /** @var null|string */
    public $pid;
    public $name;
    public $nominal;
    public $description;

    /** @var string table component */
    public $rightTableComponent = 'walet::spending.component';

    /** @var BillRequest */
    protected $request;

    public function __construct(string $id = null)
    {
        parent::__construct($id);
        $this->request = new SpendingRequest;
    }

    /**
     * Reset value
     *
     * @return void
     */
    protected function resetValue(): void
    {
        $this->pid = null;
        $this->name = null;
        $this->nominal = null;
        $this->description = null;
    }

    public function create()
    {
        $this->resetValue();
        return $this->emit('modal-toggle');
    }

    public function add(): Event
    {
        $validated = $this->validate($this->request->rules(), [], $this->request->attributes());

        if ($this->query()->create($validated)) {
            $this->resetValue();
            return $this->success('Berhasil!', 'Pengeluaran berhasil ditambahkan.');
        }

        return $this->error('Oops..', 'Terjadi kesalahan saat menambah pengeluaran.');
    }

    public function edit(string $id): Event
    {
        $this->pid = $id;
        $query = $this->query()->whereId($id)->first();

        if (!$query) {
            return $this->error('Oops..', 'Pengeluaran tidak ditemukan.');
        }

        $this->name = $query->name;
        $this->nominal = $query->nominal;
        $this->description = $query->description;

        return $this->emit('modal-toggle', $query->description);
    }

    public function update(): Event
    {
        $spending = $this->query()->whereId($this->pid)->first();

        if (!$spending) {
            return $this->error('Oops..', 'Pengeluaran tidak ditemukan.');
        }

        $validated = $this->validate($this->request->rules(), [], $this->request->attributes());

        if ($spending->update($validated)) {
            return $this->success('Berhasil!', 'Pengeluaran berhasil diubah.');
        }

        return $this->error('Oops..', 'Terjadi kesalahan saat mengubah pengeluaran.');
    }

    public function delete(string $id)
    {
        if ($this->query()->whereId($id)->delete()) {
            return $this->success('Berhasil!', 'Pengeluaran berhasil dihapus.');
        }

        return $this->error('Oops..', 'Terjadi kesalahan saat menghapus pengeluaran.');
    }

    public function query(): Builder
    {
        return Spending::query();
    }

    public function columns(): array
    {
        return [
            Column::make('no')->rowIndex(),
            Column::make('nama', 'name')
                ->searchable()
                ->sortable(),
            Column::make('nominal')
                ->searchable()
                ->sortable()
                ->format(function (Spending $model) {
                    return idr($model->nominal);
                }),
            Column::make('keterangan', 'description')
                ->searchable()
                ->format(function (Spending $model) {
                    return $this->html($model->description);
                }),
            Column::make('tanggal', 'created_at')
                ->sortable()
                ->searchable()
                ->format(function (Spending $model) {
                    return format_date($model->created_at);
                }),
            Column::make('aksi')
                ->format(function (Spending $model) {
                    return view('walet::spending.action', ['model' => $model]);
                })
        ];
    }
}
