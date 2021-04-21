<?php

namespace Modules\Master\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Master\Entities\Room;
use Modules\Master\Entities\Student;
use Illuminate\Database\Eloquent\Model;

class MasterDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Student::factory()->count(10)->for(Room::factory())->create();
    }
}
