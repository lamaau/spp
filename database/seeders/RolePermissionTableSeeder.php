<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // data master -------------------------------
        Permission::create(['module' => 'master', 'name' => 'manage_room', 'display_name' => 'Kelola Kelas']);
        Permission::create(['module' => 'master', 'name' => 'manage_school_year', 'display_name' => 'Kelola Tahun Ajaran']);
        Permission::create(['module' => 'master', 'name' => 'manage_student', 'display_name' => 'Kelola Siswa']);
        Permission::create(['module' => 'master', 'name' => 'manage_bill', 'display_name' => 'Kelola Tagihan']);
        Permission::create(['module' => 'master', 'name' => 'manage_document', 'display_name' => 'Kelola Dokumen']);

        // data payment ------------------------------
        Permission::create(['module' => 'payment', 'name' => 'manage_spending', 'display_name' => 'Kelola Pengeluaran']);
        Permission::create(['module' => 'payment', 'name' => 'manage_payment', 'display_name' => 'Kelola Pembayaran']);

        // data setting and report -------------------
        Permission::create(['module' => 'setting', 'name' => 'manage_setting', 'display_name' => 'Kelola Pengaturan']);
        Permission::create(['module' => 'report', 'name' => 'view_report', 'display_name' => 'Lihat Laporan']);
    }
}
