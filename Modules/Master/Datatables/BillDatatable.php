<?php

namespace Modules\Master\Datatables;

use Livewire\Event;
use App\Datatables\Column;
use Livewire\WithFileUploads;
use App\Datatables\Traits\Notify;
use Modules\Master\Entities\Bill;
use App\Datatables\TableComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Datatables\Traits\DocumentImport;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;
use App\Datatables\Traits\DocumentListeners;
use Modules\Master\Http\Requests\BillRequest;

class BillDatatable extends TableComponent
{
    use DocumentListeners,
        WithFileUploads,
        HtmlComponents,
        DocumentImport,
        Notify;

    /** @var null|string|bool */
    public $pid = null;
    public $name = null;
    public $monthly = false;
    public $nominal = null;
    public $description = null;

    /** @var bool|string table component */
    public $cardHeaderAction = 'master::bill.component';
    public string $formatFile = 'format-tagihan.ods';

    /** @var BillRequest */
    protected $request;

    public function __construct(string $id = null)
    {
        parent::__construct($id);

        $this->request = new BillRequest;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel(): string
    {
        return '\Modules\Master\Entities\Bill';
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
        $this->monthly = false;
        $this->nominal = null;
        $this->description = null;
    }

    public function create(): Event
    {
        $this->resetValue();
        return $this->emit('modal:toggle');
    }

    /**
     * Save new rooms
     *
     * @return Event
     */
    public function save(): Event
    {
        $this->nominal = clean_currency_format($this->nominal);

        $validated = $this->validate($this->request->rules(), [], $this->request->attributes());

        if (resolve(\Modules\Master\Repository\BillRepository::class)->save($validated)) {
            $this->resetValue();
            $this->emit('modal:toggle');
            return $this->success('Berhasil!', 'Tagihan telah ditambahkan.');
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
        $this->query = $this->query()->where('id', $this->pid)->first();
        $this->name = $this->query->name;
        $this->monthly = $this->query->monthly;
        $this->nominal = $this->query->nominal;
        $this->description = $this->query->description;

        return $this->emit('modal:toggle');
    }

    public function update(): Event
    {
        $validated = $this->validate($this->request->rules($this->pid), [], $this->request->attributes());
        $this->query()->where('id', $this->pid)->first()->update($validated);
        $this->emit('modal:toggle');
        return $this->success('Berhasil!', 'Tagihan telah diubah.');
    }

    /**
     * Delete bill
     *
     * @param string $id
     * @return Event
     */
    public function delete(string $id, string $password): Event
    {
        if (Hash::check($password, Auth::user()->password)) {
            if (resolve(\Modules\Master\Repository\BillRepository::class)->delete($id)) {
                return $this->success('Berhasil!', 'Tagihan berhasil dihapus.');
            }

            return $this->error('Oopss!', 'Maaf, terjadi kesalahan.');
        }

        return $this->error('', 'Password yang anda masukan salah.');
    }

    public function query(): Builder
    {
        return Bill::query();
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
                ->format(function (Bill $model) {
                    return idr($model->nominal);
                }),
            Column::make('bulanan', 'monthly')
                ->searchable()
                ->sortable()
                ->format(function (Bill $model) {
                    return ($model->monthly) ? 'Ya' : 'Tidak';
                }),
            Column::make('keterangan', 'description')
                ->searchable()
                ->format(function (Bill $model) {
                    return $model->description ?? '-';
                }),
            Column::make('tanggal', 'created_at')
                ->sortable()
                ->searchable()
                ->format(function (Bill $model) {
                    return format_date($model->created_at);
                }),
            Column::make('aksi')
                ->format(function (Bill $model) {
                    return view('master::bill.action', ['model' => $model]);
                })
        ];
    }
}
