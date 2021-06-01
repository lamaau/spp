<?php

namespace Modules\Master\Datatables;

use Livewire\Event;
use App\Datatables\Column;
use Livewire\WithFileUploads;
use App\Datatables\Traits\Notify;
use App\Datatables\TableComponent;
use App\Jobs\ConvertWithImportJob;
use Illuminate\Support\Facades\Auth;
use Modules\Document\Entities\Document;
use Modules\Master\Entities\SchoolYear;
use App\Datatables\Traits\HtmlComponents;
use App\Datatables\Traits\Listeners;
use Illuminate\Database\Eloquent\Builder;
use Modules\Master\Imports\SchoolYearImport;
use Modules\Master\Http\Requests\SchoolYearRequest;

class SchoolYearDatatable extends TableComponent
{
    use WithFileUploads,
        HtmlComponents,
        Listeners,
        Notify;

    /** @var null|string|object */
    public $pid;
    public $year = null;
    public $file = null;
    public $description = null;

    /** @var bool|string table component */
    public $cardHeaderAction = 'master::school-year.component';

    public string $fileFormatName = 'format-tahun-ajaran.xlsx';

    /** @var object */
    protected $request;

    public function __construct(string $id = null)
    {
        parent::__construct($id);

        $this->request = new SchoolYearRequest;
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
    public function delete(string $id): Event
    {
        if (resolve(\Modules\Master\Repository\SchoolYearRepository::class)->delete($id)) {
            return $this->success('Berhasil!', 'Tahun ajaran berhasil dihapus.');
        }

        return $this->error('Oopss!', 'Maaf, terjadi kesalahan.');
    }

    /**
     * Upload and import
     *
     * @return Event
     */
    public function upload(): Event
    {
        $this->validate([
            'file' => ['required', 'max:1024', 'mimes:ods,xls,xlsx'],
        ]);

        $filename = $this->file->storeAs(
            'uploads/imports',
            generate_document_name($this->file->getClientOriginalExtension(), 'document_original', 'uploads/imports')
        );

        $data = [
            'filename' => $filename,
            'model' => "\Modules\Master\Entities\SchoolYear",
            'created_by' => Auth::id(),
        ];

        try {
            $document = Document::create($data);

            /** convert and import */
            ConvertWithImportJob::dispatch($document, new SchoolYearImport($document));

            $this->emit('import:complete');
            return $this->success('Berhasil!', 'Dokumen berhasil diupload.');
        } catch (\Throwable $e) {
            return $this->error('Oops.', $e->getMessage());
        }
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
                    return format_date($model->created_at);
                }),
            Column::make('aksi')
                ->format(function (SchoolYear $model) {
                    return view('master::school-year.action', ['model' => $model]);
                })
        ];
    }
}
