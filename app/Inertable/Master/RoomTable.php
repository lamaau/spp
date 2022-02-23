<?php

declare(strict_types=1);

namespace App\Inertable\Master;

use App\Models\Room;
use Rizkhal\Inertable\Column;
use Illuminate\Support\Carbon;
use Rizkhal\Inertable\Inertable;
use Illuminate\Database\Eloquent\Builder;

class RoomTable extends Inertable
{
    public function query(): Builder
    {
        return Room::query();
    }

    public function columns(): array
    {
        return [
            Column::blank()->checkbox(),
            Column::make(__('Name'), 'name')->sortable()->searchable(),
            Column::make(__('Description'), 'description')->sortable()->searchable(),
            Column::make(__('Created At'), 'created_at')->sortable()->searchable()->format(fn (Carbon $value): string => $value->format('d/m/Y')),
            Column::blank(),
        ];
    }
}
