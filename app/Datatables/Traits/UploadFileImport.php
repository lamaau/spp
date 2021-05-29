<?php

namespace App\Datatables\Traits;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

trait UploadFileImport
{
    /** @var object */
    public $fileImport;

    /**
     * Remove file upload
     *
     * @return void
     */
    public function removeFileImport(): void
    {
        $this->fileImport = null;
    }

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
     * Upload file
     *
     * @return string
     */
    public function uploadFileImport(): string
    {
        $this->validate([
            'fileImport' => ['required', 'max:1024', 'mimes:xls,xlsx,ods'],
        ]);

        return $this->fileImport->storeAs(
            property_exists(
                $this,
                'fileUploadDestination'
            ) ? $this->fileUploadDestination : 'uploads/imports',
            date('YmdHis') . '__' . $this->fileImport->getClientOriginalName()
        );
    }
}
