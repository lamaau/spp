<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Master\Database\Seeders\AdminTableSeederTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeederTableSeeder::class);
    }
}
