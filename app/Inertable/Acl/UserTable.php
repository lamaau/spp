<?php

declare(strict_types=1);

namespace App\Inertable\Acl;

use App\Models\User;
use Rizkhal\Inertable\Column;
use Illuminate\Support\Carbon;
use Rizkhal\Inertable\Inertable;
use Illuminate\Database\Eloquent\Builder;

class UserTable extends Inertable
{
    public function query(): Builder
    {
        return User::query();
    }

    public function columns(): array
    {
        return [
            Column::blank()->checkbox(),
            Column::make('name')->sortable()->searchable(),
            Column::make('email')->sortable()->searchable(),
            Column::make('Verifikasi', 'email_verified_at')->sortable()->searchable()->format(fn (Carbon $value): string => $value->format('d/m/Y')),
            Column::make('status')->sortable()->searchable(),
            Column::blank(),
        ];
    }
}
