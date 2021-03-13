<?php

namespace App\Repository;

if (!interface_exists('InstallRepository')) {
    interface InstallRepository
    {
        public function save(array $request): bool;
    }
}
