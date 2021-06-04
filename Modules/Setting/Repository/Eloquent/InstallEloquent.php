<?php

namespace Modules\Setting\Repository\Eloquent;

use Illuminate\Support\Facades\DB;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Repository\InstallRepository;

class InstallEloquent implements InstallRepository
{
    /** @var Setting */
    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    /**
     * Get setting
     *
     * @return object
     */
    public function first(): ?object
    {
        return $this->setting->first();
    }

    /**
     * Setup application
     *
     * @param array $request
     * @return boolean
     */
    public function setup(array $request): bool
    {

        DB::beginTransaction();

        try {
            $this->setting->create($request);
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
