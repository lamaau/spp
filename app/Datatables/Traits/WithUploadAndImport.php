<?php

namespace App\Datatables\Traits;

use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Master\Imports\RoomImport;

trait WithUploadAndImport
{
    /** @var object */
    public $file;

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

            if (method_exists($this, 'getImportModel')) {
                $uploaded = $this->getImportModel()->create([
                    'filename'   => $filename,
                    'created_by' => Auth::id(),
                ]);
            }

            if (method_exists($this, 'import')) {
                $this->import($uploaded);
            }

            $this->remove();

            return $this->success('Yosh..', 'Dokumen berhasil diupload.');
        } catch (\Exception $e) {
            return $this->error('Oops..', 'Terjadi kesalahan, periksa kembali data anda.');
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
