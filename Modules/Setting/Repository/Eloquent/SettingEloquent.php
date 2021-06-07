<?php

namespace Modules\Setting\Repository\Eloquent;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Modules\Setting\Entities\Mail;
use Illuminate\Support\Facades\Auth;
use Modules\Setting\Entities\Pusher;
use Modules\Setting\Entities\Setting;
use Illuminate\Support\Facades\Artisan;
use Modules\Setting\Repository\SettingRepository;

class SettingEloquent implements SettingRepository
{
    private Mail $mail;
    private Pusher $pusher;
    private Setting $setting;

    public function __construct(
        Mail $mail,
        Pusher $pusher,
        Setting $setting
    ) {
        $this->mail = $mail;
        $this->pusher = $pusher;
        $this->setting = $setting;
    }

    /**
     * General setting
     * 
     * @return null|object
     */
    public function general(): ?object
    {
        return $this->setting->first();
    }

    /**
     * Mail configuration
     *
     * @return object|null
     */
    public function mailConfiguration(): ?object
    {
        return $this->mail->first();
    }

    /**
     * Pusher configuration
     *
     * @return object|null
     */
    public function pusherConfiguration(): ?object
    {
        return  $this->pusher->first();
    }

    public function saveOrUpdate(string $table, array $request): bool
    {
        DB::beginTransaction();

        try {
            $query = DB::table($table)->first();
            if ($query) {
                DB::commit();
                Artisan::call('optimize:clear');
                return DB::table($table)
                    ->where('id', $query->id)->update(
                        array_merge([
                            'updated_by' => Auth::id()
                        ], $request)
                    ) ? true : false;
            }

            DB::commit();
            Artisan::call('optimize:clear');
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
