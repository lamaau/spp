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
        Nav::define(fn (User $user): array => [
            Nav::item('__')
                ->subItems([
                    Nav::item('Dasbor')->for('/dashboard')->heroicon('PresentationChartLineIcon'),
                    Nav::item('Laporan')->for('/dashboard')->heroicon('DocumentReportIcon'),
                ]),
            Nav::item('__')
                ->subItems([
                    Nav::item('Biaya')->for('#')->heroicon('CashIcon'),
                    Nav::item('Kas & Bank')->for('#')->heroicon('LibraryIcon'),
                ]),
            Nav::item('__')
                ->subItems([
                    Nav::item('Daftar Akun')->for('/accounts')->heroicon('ClipboardListIcon'),
                    Nav::item('Pengaturan Aset')->for('#')->heroicon('OfficeBuildingIcon'),
                ]),
            Nav::item('__')
                ->subItems([
                    Nav::item('Dokumentasi')->for('#')->heroicon('DocumentTextIcon'),
                    Nav::item('Changelog')->for('#')->heroicon('ExclamationCircleIcon'),
                ]),
        ]);
    }
}
