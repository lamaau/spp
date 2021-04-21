<?php

namespace Modules\Master\Repository\Eloquent;

use App\Datatables\Traits\FileUpload;
use Modules\Master\Repository\FileUploadRepository;

class FileUploadEloquent implements FileUploadRepository
{
    /** @var FileUpload */
    protected $fileUpload;

    public function __construct(FileUpload $fileUpload)
    {
        $this->fileUpload = $fileUpload;
    }

    /**
     * Save file upload
     *
     * @param array $request
     * @return boolean
     */
    public function save(array $request): bool
    {
        return $this->fileUpload->create($request) ? true : false;
    }
}
