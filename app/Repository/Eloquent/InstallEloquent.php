<?php

namespace App\Repository\Eloquent;

use App\Models\Setting;
use App\Repository\InstallRepository;

class InstallEloquent implements InstallRepository
{
    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function save(array $request): bool
    {
        return $this->setting->create($request) ? true : false;
    }
}
