<?php

declare(strict_types=1);

namespace App\Providers;

use Nedwors\Navigator\Facades\Nav;
use Illuminate\Support\ServiceProvider;

class NavigatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Nav::define(fn ($user): array => [
            Nav::item('__')
                ->subItems([
                    Nav::item('Dasbor')->for('/dashboard')->heroicon('PresentationChartLineIcon'),
                    Nav::item('Laporan')->for('/report')->heroicon('DocumentReportIcon'),
                ]),
            Nav::item('__')
                ->subItems([
                    Nav::item('Kelas')->for('/master/room')->heroicon('CashIcon'),
                    Nav::item('Tahun Ajaran')->for('/master/year')->heroicon('LibraryIcon'),
                    Nav::item('Siswa')->for('#')->heroicon('LibraryIcon'),
                    Nav::item('Tagihan')->for('#')->heroicon('LibraryIcon'),
                ]),
            Nav::item('__')
                ->subItems([
                    Nav::item('Pendapatan')->for('#')->heroicon('ExclamationCircleIcon'),
                    Nav::item('Pengeluaran')->for('#')->heroicon('DocumentTextIcon'),
                ]),
            Nav::item('__')
                ->subItems([
                    Nav::item('Pengguna')->for('/acl/user')->heroicon('UserGroupIcon'),
                    Nav::item('Hak Akses')->for('#')->heroicon('LockClosedIcon'),
                ]),
            Nav::item('__')
                ->subItems([
                    Nav::item('Dokumentasi')->for('#')->heroicon('DocumentTextIcon'),
                    Nav::item('Changelog')->for('#')->heroicon('ExclamationCircleIcon'),
                ]),
        ]);
    }
}
