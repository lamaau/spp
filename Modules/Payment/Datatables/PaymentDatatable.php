<?php

namespace Modules\Payment\Datatables;

use Livewire\Event;
use App\Datatables\Column;
use Livewire\WithFileUploads;
use App\Datatables\Traits\Notify;
use Modules\Master\Entities\Bill;
use App\Datatables\TableComponent;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Master\Imports\RoomImport;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;
use Modules\Master\Http\Requests\BillRequest;
use App\Datatables\Traits\WithUploadAndImport;

class PaymentDatatable extends TableComponent
{
    use WithUploadAndImport,
        WithFileUploads,
        HtmlComponents,
        Notify;

    public $years;
    public $title;

    public $state = false;

    /** @var string */
    public $pid;
    public $query;
    public $name = null;
    public $monthly = false;
    public $nominal = null;
    public $description = null;

    /** @var string table component */
    public $rightTableComponent = 'master::bill.component';

    /** @var string file upload and import */
    protected $importModel = Room::class;
    protected $fileUploadDestination = 'bills';
    protected $fileFormatName = 'Format_Tagihan.xlsx';

    /** @var BillRequest */
    protected $request;

    public function __construct(string $id = null)
    {
        parent::__construct($id);

        $this->request = new BillRequest;
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
                    return date('F d, Y', strtotime($model->created_at));
                }),
            Column::make('aksi')
                ->format(function (Bill $model) {
                    return view('master::bill.action', ['model' => $model]);
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
        $this->monthly = false;
        $this->nominal = null;
        $this->description = null;
    }

    public function create(): Event
    {
        $this->state = true;
        $this->title = "Tambah Tagihan";
        $this->resetValue();
        return $this->emit('modal-toggle');
    }

    /**
     * Save new rooms
     *
     * @return Event
     */
    public function save(): Event
    {
        $this->nominal = str_replace('.', '', $this->nominal);

        $validated = $this->validate($this->request->rules(), [], $this->request->attributes());

        if (resolve(\Modules\Master\Repository\BillRepository::class)->save($validated)) {
            $this->resetValue();
            return $this->success('Berhasil!', 'Tagihan telah ditambahkan.');
        }

        return $this->error('Oopss!', 'Maaf, terjadi kesalahan.');
    }

    public function edit(string $id): Event
    {
        $this->state = false;
        $this->title = "Ubah Tagihan";
        $this->pid = $id;
        $this->query = $this->query()->where('id', $id)->first();
        $this->name = $this->query->name;
        $this->monthly = $this->query->monthly;
        $this->nominal = $this->query->nominal;
        $this->description = $this->query->description;

        return $this->emit('modal-toggle');
    }

    public function update(): Event
    {
        $validated = $this->validate($this->request->rules($this->pid), [], $this->request->attributes());
        $this->query->update($validated);
        return $this->success('Berhasil!', 'Tagihan telah diubah.');
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
            'title' => 'Hapus Tagihan?',
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
        if (resolve(\Modules\Master\Repository\BillRepository::class)->delete($id)) {
            return $this->success('Berhasil!', 'Tagihan telah dihapus.');
        }

        return $this->error('Oopss!', 'Maaf, terjadi kesalahan.');
    }

    /**
     * Upload and import
     * -----------------------------------------------
     */

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
            return $this->success('Berhasil!', 'Tagihan telah diimport.');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            return $this->addError('file', $e->failures()[0]->errors()[0]);
        }
    }
}
