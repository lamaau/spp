<?php

declare(strict_types=1);

namespace App\Inertable\Client\Master;

use App\Models\Year;
use Rizkhal\Inertable\Column;
use Illuminate\Support\Carbon;
use Rizkhal\Inertable\Inertable;
use Illuminate\Database\Eloquent\Builder;

class YearTable extends Inertable
{
    public function query(): Builder
    {
        return Year::query();
    }

    public function columns(): array
    {
        return [
            Column::blank()->checkbox(),
            Column::make(__('Year'), 'year')->sortable()->searchable(),
            Column::make(__('Description'), 'description')->sortable()->searchable(),
            Column::make(__('Created At'), 'created_at')->sortable()->searchable()->format(fn (Carbon $value): string => $value->format('d/m/Y')),
            Column::blank(),
        ];
    }
}
