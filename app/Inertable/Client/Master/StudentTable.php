<?php

declare(strict_types=1);

namespace App\Inertable\Client\Master;

use App\Models\User;
use App\Models\Student;
use Rizkhal\Inertable\Column;
use Illuminate\Support\Carbon;
use Rizkhal\Inertable\Inertable;
use Illuminate\Database\Eloquent\Builder;

class StudentTable extends Inertable
{
    public function query(): Builder
    {
        return User::query()->students();
    }

    public function columns(): array
    {
        return [
            Column::blank()->checkbox(),
            Column::make(__('Name'), 'name')->sortable()->searchable(),
            Column::make(__('Email'), 'email')->sortable()->searchable(),
            Column::make(__('Verified'), 'email_verified_at')->sortable()->searchable()->format(fn (Carbon|null $value): string|null => $value?->format('d/m/Y')),
            Column::make(__('status'), 'status')->sortable()->searchable(),
            Column::blank(),
        ];
    }
}
