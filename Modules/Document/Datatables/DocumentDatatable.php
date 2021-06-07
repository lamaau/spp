<?php

namespace Modules\Document\Datatables;

use App\Datatables\Column;
use App\Datatables\Traits\Notify;
use App\Datatables\TableComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Modules\Document\Entities\Document;
use App\Datatables\Traits\HtmlComponents;
use Illuminate\Database\Eloquent\Builder;

class DocumentDatatable extends TableComponent
{
    use HtmlComponents,
        Notify;

    public $cardHeaderAction = "document::component";

    public function download(string $id)
    {
        $document = $this->query()->where('id', $id)->first();
        return Storage::disk('public')->download($document->filename);
    }

    public function delete(string $id, string $password)
    {
        if (Hash::check($password, Auth::user()->password)) {
            $document = $this->query()->where('id', $id)->first();

            return $document->delete()
                ? $this->success('Berhasil!', 'Dokumen berhasil dihapus.')
                : $this->error('Oops!', 'Terjadi kesalahan saat menghapus dokumen.');
        }

        return $this->error('', 'Password yang anda masukan salah');
    }

    public function query(): Builder
    {
        return Document::query();
    }

    public function columns(): array
    {
        return [
            // Column::make('checkbox'),
            Column::make('Nama File', 'filename')
                ->searchable()
                ->sortable(),
            Column::make('Oleh', 'created_by')
                ->searchable()
                ->sortable()
                ->format(function (Document $model) {
                    return $model->author->name;
                }),
            Column::make('Tanggal Upload', 'created_at')
                ->searchable()
                ->sortable()
                ->format(function (Document $model) {
                    return format_date($model->created_at);
                }),
            Column::make('aksi')
                ->format(function (Document $model) {
                    return view('document::action', ['model' => $model]);
                })
        ];
    }
}
