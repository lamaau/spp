<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register repository pattern.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            \App\Repository\StudentRepository::class,
            \App\Repository\Eloquent\StudentEloquent::class
        );

        $this->app->bind(
            \App\Repository\RoomRepository::class,
            \App\Repository\Eloquent\RoomEloquent::class
        );

        $this->app->bind(
            \App\Repository\LevelRepository::class,
            \App\Repository\Eloquent\LevelEloquent::class
        );
    }
}
