<?php

namespace Modules\Master\Repository;

if (!interface_exists('FileUploadRepository'))
{
    interface FileUploadRepository
    {
        /**
         * Save file upload
         *
         * @param array $request
         * @return boolean
         */
        public function save(array $request): bool;
    }
}