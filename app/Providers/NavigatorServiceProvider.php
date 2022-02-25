<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use App\Models\School;
use Nedwors\Navigator\Facades\Nav;
use Illuminate\Support\ServiceProvider;

class NavigatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Nav::define(function (User $user, School|null $school) {
            if (!is_null($school)) {
                return static::adminMenuNavigator($user, $school);
            }

            return static::superAdminMenuNavigator($user);
        });
    }

    private static function superAdminMenuNavigator(User $user): array
    {
        return [
            Nav::item('__')
                ->subItems([
                    Nav::item('Dasbor')->for(route('superadmin.dashboard'))->heroicon('PresentationChartLineIcon'),
                    Nav::item('Laporan')->for("/report")->heroicon('ChartSquareBarIcon'),
                ]),
        ];
    }

    private static function adminMenuNavigator(User $user, School $school): array
    {
        return [
            Nav::item('__')
                ->subItems([
                    Nav::item('Dasbor')->for("/{$school->id}/dashboard")->heroicon('PresentationChartLineIcon'),
                    Nav::item('Laporan')->for("/{$school->id}/report")->heroicon('ChartSquareBarIcon'),
                ]),
            Nav::item('__')
                ->subItems([
                    Nav::item('Kelas')->for("/{$school->id}/master/room")->heroicon('LibraryIcon'),
                    Nav::item('Tahun Ajaran')->for("/{$school->id}/master/year")->heroicon('ClipboardListIcon'),
                    Nav::item('Siswa')->for("/{$school->id}/master/student")->heroicon('UserGroupIcon'),
                    Nav::item('Tagihan')->for("/{$school->id}/master/bill")->heroicon('CashIcon'),
                ]),
            Nav::item('__')
                ->subItems([
                    Nav::item('Pemasukan')->for('#')->heroicon('CashIcon'),
                    Nav::item('Pengeluaran')->for('#')->heroicon('DocumentTextIcon'),
                ]),
            Nav::item('__')
                ->subItems([
                    Nav::item('Pengguna')->for("/{$school->id}/acl/user")->heroicon('UsersIcon'),
                    Nav::item('Hak Akses')->for('#')->heroicon('LockClosedIcon'),
                ]),
            Nav::item('__')
                ->subItems([
                    Nav::item('Dokumentasi')->for('#')->heroicon('DocumentTextIcon'),
                    Nav::item('Changelog')->for('#')->heroicon('ExclamationCircleIcon'),
                ]),
        ];
    }
}
