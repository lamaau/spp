<?php

namespace Modules\Setting\Repository\Eloquent;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Modules\Setting\Repository\SettingRepository;

class SettingEloquent implements SettingRepository
{
    /**
     * General setting
     * 
     * @return null|object
     */
    public function general(): ?object
    {
        return \Modules\Setting\Entities\Setting::first();
    }

    public function saveOrUpdate(string $table, array $request): bool
    {
        DB::beginTransaction();

        try {
            $query = DB::table($table)->first();
            if ($query) {
                DB::commit();
                return DB::table($table)
                    ->where('id', $query->id)->update(
                        array_merge([
                            'updated_by' => Auth::id()
                        ], $request)
                    ) ? true : false;
            }

            DB::commit();
            return DB::table($table)
                ->insert(
                    array_merge([
                        'id' => Str::uuid()->toString(),
                        'created_by' => Auth::id(),
                    ], $request)
                ) ? true : false;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
