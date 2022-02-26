<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use Nedwors\Navigator\Facades\Nav;
use Illuminate\Support\ServiceProvider;

class NavigatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Nav::define(function (User $user) {
            if ($user->isAdmin()) {
                return static::adminMenuNavigator($user);
            }

            return static::clientMenuNavigator($user);
        });
    }

    private static function adminMenuNavigator()
    {
        return [
            Nav::item('__')
                ->subItems([
                    Nav::item(__('Dasbor'))->for("/dashboard")->heroicon('PresentationChartLineIcon'),
                    Nav::item(__('Client'))->for("/report")->heroicon('UserGroupIcon'),
                ]),
        ];
    }

    private static function clientMenuNavigator(User $user): array
    {
        return [
            Nav::item('__')
                ->subItems([
                    Nav::item('Dasbor')->for("/dashboard")->heroicon('PresentationChartLineIcon'),
                    Nav::item('Laporan')->for("/report")->heroicon('ChartSquareBarIcon'),
                ]),
            Nav::item('__')
                ->subItems([
                    Nav::item('Kelas')->for("/master/room")->heroicon('LibraryIcon'),
                    Nav::item('Tahun Ajaran')->for("/master/year")->heroicon('ClipboardListIcon'),
                    Nav::item('Siswa')->for("/master/student")->heroicon('UserGroupIcon'),
                    Nav::item('Tagihan')->for("/master/bill")->heroicon('CashIcon'),
                ]),
            Nav::item('__')
                ->subItems([
                    Nav::item('Pemasukan')->for('#')->heroicon('CashIcon'),
                    Nav::item('Pengeluaran')->for('#')->heroicon('DocumentTextIcon'),
                ]),
            Nav::item('__')
                ->subItems([
                    Nav::item('Pengguna')->for("/acl/user")->heroicon('UsersIcon'),
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
