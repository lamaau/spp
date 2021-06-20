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

        $superadmin = Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);
        $superadmin->givePermissionTo(Permission::all());

        $operator = Role::create(['name' => 'Operator', 'guard_name' => 'web']);
        $operator->givePermissionTo(Permission::where('module', 'payment')->get());

        User::create([
            'name' => 'Admin',
            'email' => 'admin@domain.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
        ])->assignRole('Super Admin');

        User::create([
            'name' => 'Operator',
            'email' => 'operator@domain.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
        ])->assignRole('Operator');
    }
}
