<?php

namespace Modules\Master\Datatables;

use Livewire\Event;
use App\Datatables\Column;
use Livewire\WithFileUploads;
use App\Datatables\Traits\Notify;
use App\Datatables\TableComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Master\Entities\SchoolYear;
use App\Datatables\Traits\DocumentImport;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;
use App\Datatables\Traits\DocumentListeners;
use Modules\Master\Http\Requests\SchoolYearRequest;

class SchoolYearDatatable extends TableComponent
{
    use DocumentListeners,
        WithFileUploads,
        HtmlComponents,
        DocumentImport,
        Notify;

    /** @var null|string|object */
    public $pid;
    public $year = null;
    public $file = null;
    public $description = null;

    /** @var bool|string table component */
    public $cardHeaderAction = 'master::school-year.component';
    public string $formatFile = 'format-tahun-ajaran.ods';

    /** @var object */
    protected $request;

    public function __construct(string $id = null)
    {
        parent::__construct($id);

        $this->request = new SchoolYearRequest;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel(): string
    {
        return '\Modules\Master\Entities\SchoolYear';
    }

    /**
     * Reset value
     *
     * @return void
     */
    public function resetValue(): void
    {
        $this->pid = null;
        $this->year = null;
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

        if (resolve(\Modules\Master\Repository\SchoolYearRepository::class)->save($validated)) {
            $this->resetValue();
            $this->emit('modal:toggle');
            return $this->success('Berhasil!', 'Tahun ajaran berhasil ditambahkan.');
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
        $this->year = $query->year;
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
        return $this->success('Berhasil!', 'Tahun ajaran berhasil diubah.');
    }

    /**
     * Delete room
     *
     * @param string $id
     * @return Event
     */
    public function delete(string $id, string $password): Event
    {
        if (Hash::check($password, Auth::user()->password)) {
            if (resolve(\Modules\Master\Repository\SchoolYearRepository::class)->delete($id)) {
                return $this->success('Berhasil!', 'Tahun Ajaran berhasil dihapus.');
            }

            return $this->error('Oopss!', 'Maaf, terjadi kesalahan.');
        }

        return $this->error('', 'Password yang anda masukan salah.');
    }

    public function query(): Builder
    {
        return SchoolYear::query()->withCount('payments');
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
            Column::make('jumlah transaksi', 'payments_count')
                ->searchable()
                ->format(function (SchoolYear $model) {
                    return $model->payments_count;
                }),
            Column::make('tanggal', 'created_at')
                ->sortable()
                ->searchable()
                ->format(function (SchoolYear $model) {
                    return format_date($model->created_at);
                }),
            Column::make('aksi')
                ->format(function (SchoolYear $model) {
                    return view('master::school-year.action', ['model' => $model]);
                })
        ];
    }
}
