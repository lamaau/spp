<?php

namespace Modules\Setting\Repository\Eloquent;

use Modules\Master\Entities\Setting;
use Modules\Setting\Repository\GeneralRepository;

class GeneralEloquent implements GeneralRepository
{
    /** @var Setting */
    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function first(): object
    {
        return $this->setting->first();
    }

    public function save(array $request): bool
    {
        return $this->setting->create($request) ? true : false;
    }
}
