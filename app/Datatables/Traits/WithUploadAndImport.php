<?php

namespace App\Datatables\Traits;

use Livewire\Event;
use Modules\Master\Entities\FormatFile;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

trait WithUploadAndImport
{
    /** @var object */
    public $file;

    /**
     * Download import format
     *
     * @return BinaryFileResponse
     */
    public function downloadFormat(): ?BinaryFileResponse
    {
        if (property_exists($this, 'fileFormatName')) {
            return response()->download(config('format.path') . "/{$this->fileFormatName}");
        }

        throw new \Exception("File format name not defined", 1);
    }

    /**
     * Handle file upload
     *
     * @return string|object
     */
    public function upload()
    {
        $this->validate([
            'file' => ['required', 'max:1024', 'mimes:xls,xlsx,ods'],
        ]);

        try {
            $filename = $this->file->storeAs(
                property_exists(
                    $this,
                    'fileUploadDestination'
                ) ? $this->fileUploadDestination : 'uploads',
                $this->file->getClientOriginalName()
            );

            /**
             * If add importModel property
             * the filename and model saved on format_files table
             * and return is object
             */
            if (property_exists($this, 'importModel')) {
                $uploaded = FormatFile::create([
                    'model' => $this->importModel,
                    'filename' => $filename,
                ]);

                return $uploaded;
            }

            return $filename;
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Remove file upload
     *
     * @return void
     */
    public function remove(): void
    {
        $this->file = null;
    }
}
