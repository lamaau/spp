<?php

namespace Modules\GoenDataMaster\Repository\Eloquent;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\GoenDataMaster\Constants\Modules;
use Modules\GoenDataMaster\Constants\Payment;
use Modules\GoenDataMaster\Constants\Plan;
use Modules\GoenDataMaster\Entities\Setting;
use Modules\GoenDataMaster\Repository\SettingRepository;

class SettingEloquent implements SettingRepository
{
    protected $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function first(): object
    {
        return $this->setting->with(['modules', 'invoices'])->first();
    }

    /**
     * Get paid setting plan
     * 
     * @return Collection
     */
    public function paid(): Collection
    {
        return $this->setting->whereHas('invoices', function ($query) {
            $query->where('status', Payment::PAID);
        })->where('created_by', Auth::id())->get();
    }

    /**
     * Unpaid setting plan
     *
     * @return collection
     */
    public function unpaid(): Collection
    {
        return $this->setting->whereHas('invoices', function ($query) {
            $query->where('status', Payment::UNPAID);
        })->where('created_by', Auth::id())->get();
    }

    /**
     * Save  the setting app
     *
     * @param  array  $request
     * @return bool
     */
    public function save(array $request): bool
    {
        DB::beginTransaction();

        try {
            $modules = $request['modules'];
            $expired = $request['expired_at'];

            unset($request['modules']);
            unset($request['expired_at']);

            $setting = $this->setting->create($request);
            $setting->modules()->create([
                'module_name' => Modules::label($modules),
                'setting_id'  => $setting->id,
            ]);

            $setting->invoices()->create([
                'invoice'      => Plan::price($expired)[$expired],
                'code'         => Plan::invoice(),
                'invoice_date' => Carbon::now(),
                'invoice_due'  => Plan::expired($expired)[$expired],
                'setting_id'   => $setting->id,
                'status'       => Payment::UNPAID,
            ]);

            DB::commit();

            return $setting ? true : false;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
