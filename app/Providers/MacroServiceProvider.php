<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blueprint::macro('commonFields', function () {
            $this->timestamps();
            $this->softDeletes();
            $this->foreignUuid('created_by')->index();
            $this->foreignUuid('updated_by')->nullable()->index();
            $this->foreignUuid('deleted_by')->nullable()->index();
        });
    }
}
