<?php

namespace App\Datatables\Traits;

use Livewire\Event;
use App\Events\DocumentCreated;
use Illuminate\Support\Facades\Auth;
use Modules\Document\Entities\Document;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

trait DocumentImport
{
    /** @var object */
    public $file;

    public function removeFileImport(): void
    {
        $this->file = null;
    }

    public function downloadFormat(): BinaryFileResponse
    {
        if (property_exists($this, 'formatFile')) {
            return response()->download(config('format.path') . "/{$this->formatFile}");
        }

        throw new \Exception("Format File property does not exist", 1);
    }

    /**
     * Upload and import
     *
     * @return Event
     */
    public function upload(): Event
    {
        if (!method_exists($this, 'getModel')) {
            throw new \Exception('Method getModel does not exist');
        }
        
        $this->validate([
            'file' => ['required', 'max:1024', 'mimes:ods,xls,xlsx'],
        ]);

        $filename = $this->file->storeAs(
            'uploads/imports',
            generate_document_name(
                $this->file->getClientOriginalExtension(),
                pathinfo($this->file->getClientOriginalName(), PATHINFO_FILENAME),
                'uploads/imports'
            )
        );

        $data = [
            'filename' => $filename,
            'model' => $this->getModel(),
            'created_by' => Auth::id(),
        ];

        try {
            $document = Document::create($data);

            DocumentCreated::dispatch($document);

            $this->emit('import:complete');
            $this->removeFileImport();
            return $this->success('Berhasil!', 'Dokumen berhasil diupload.');
        } catch (\Throwable $e) {
            return $this->error('Oops!', $e->getMessage());
        }
    }
}
