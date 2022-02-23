<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\School;
use App\Enums\SchoolLevel;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $s1 = School::create([
            'id' => Str::uuid()->toString(),
            'npsn' => 60200833,
            'name' => 'SD Negeri Inpres Siko',
            'email' => 'sd_siko@sch.id',
            'phone' => '62821278242928',
            'logo' => 'dwdw',
            'level' => SchoolLevel::SD(),
            'principal' => 'Lamaau Rizkhal',
            'principal_number' => '42942420482024902',
            'treasurer' => 'Jeni Black Pink',
            'address' => 'Jalan Masih Panjang',
            'created_by' => User::firstWhere('email', 'admin@domain.com')->id,
        ]);

        $s2 = School::create([
            'id' => Str::uuid()->toString(),
            'npsn' => 602008334242,
            'name' => 'SMP Negeri Inpres Siko',
            'email' => 'smp_siko@sch.id',
            'phone' => '6281278242928',
            'logo' => 'dwdw',
            'level' => SchoolLevel::SMP(),
            'principal' => 'Rizkhal Lamaau',
            'principal_number' => '429420482024902',
            'treasurer' => 'Jeni Black Pink',
            'address' => 'Jalan Masih Panjang',
            'created_by' => User::firstWhere('email', 'admin@domain.com')->id,
        ]);
    }
}
