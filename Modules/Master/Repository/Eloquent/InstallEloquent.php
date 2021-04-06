<?php

namespace Modules\Master\Repository\Eloquent;

use Illuminate\Support\Facades\DB;
use Modules\Master\Entities\Tenant;
use Modules\Master\Entities\Setting;
use Modules\Master\Repository\InstallRepository;

class InstallEloquent implements InstallRepository
{
    protected $tenant;

    protected $setting;

    public function __construct(Tenant $tenant, Setting $setting)
    {
        $this->tenant = $tenant;
        $this->setting = $setting;
    }

    /**
     * Get setting
     *
     * @return object
     */
    public function first(): ?object
    {
        return $this->setting->where('tenant_id', session()->get('tenant'))->first();
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
            $tenant = $this->tenant->create([
                'name' => $request['name'],
                'tenant' => $request['code'],
            ]);

            $request = array_merge($request, ['tenant_id' => $tenant->id]);

            $this->setting->create($request);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
