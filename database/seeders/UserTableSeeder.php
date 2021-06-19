<?php

namespace Database\Seeders;

use App\Entities\Role;
use App\Entities\Permission;
use Illuminate\Database\Seeder;
use Modules\Master\Entities\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $role = Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);
        $role->givePermissionTo(Permission::all());

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@domain.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);

        $user->assignRole('Super Admin');
    }
}
