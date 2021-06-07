<?php

namespace Modules\Setting\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\Setting\Constants\EncryptionConstant;

class AutomationServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMail();
        $this->registerPusher();
    }

    /**
     * Register Pusher
     *
     * @return void
     */
    protected function registerPusher()
    {
        if (Schema::hasTable('pushers')) {
            $pusher = DB::table('pushers')->first();
            if ($pusher) {
                $config = [
                    'driver' => 'pusher',
                    'key' => $pusher->app_key,
                    'secret' => $pusher->app_secret,
                    'app_id' => $pusher->app_id,
                    'options' => [
                        'cluster' => $pusher->app_cluster,
                        'useTLS' => true,
                    ],
                ];

                Config::set('broadcasting', $config);
                Config::set('queue.default', 'database');
            }
        } else {
            Config::set('queue.driver', 'sync');
            Config::set('broadcasting.driver', 'log');
        }
    }

    /**
     * Register Mail
     *
     * @return void
     */
    protected function registerMail()
    {
        if (Schema::hasTable('mails')) {
            $mail = DB::table('mails')->first();
            if ($mail) {
                $config = [
                    'host' => $mail->host,
                    'port' => $mail->port,
                    'driver' => $mail->driver,
                    'username' => $mail->username,
                    'password' => $mail->password,
                    'encryption' => strtolower(EncryptionConstant::label($mail->encryption)),
                    'from' => ['address' => $mail->from_address, 'name' => $mail->from_name],
                ];
                Config::set('mail', $config);
            }
        }
    }
}
