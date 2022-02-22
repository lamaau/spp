<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@domain.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$WHp9AXVjXdSmv0q/3.iuVeEU1wUi30MiLC7Boy5ZksiBs8LUknZzK', // secret
            'remember_token' => Str::random(10),
        ]);
    }
}
