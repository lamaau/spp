<?php

namespace Modules\Master\Imports;

use Modules\Master\Entities\Room;
use Modules\Master\Entities\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\ImportFailed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Modules\Master\Notifications\ImportHasFailedNotification;

class RoomImport implements ToModel, WithChunkReading, ShouldQueue, WithStartRow, WithEvents
{
    protected $uploaded;

    public function __construct(object $uploaded)
    {
        $this->uploaded = $uploaded;
    }

    public function model(array $row)
    {
        return new Room([
            'code' => $row[0],
            'name' => $row[1],
            'description' => $row[2],
            'created_at'  => now(),
        ]);
    }

    public function registerEvents(): array
    {
        $user = User::where('id', $this->uploaded->created_by)->first();

        return [
            ImportFailed::class => function (ImportFailed $event) use ($user) {
                $user->notify(new ImportHasFailedNotification($user, $this->uploaded->filename, $event->getException()));
            },
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function startRow(): int
    {
        return 2;
    }
}
