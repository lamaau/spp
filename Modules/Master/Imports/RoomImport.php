<?php

namespace Modules\Master\Imports;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Modules\Master\Entities\Room;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\ImportFailed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Notifications\ImportFailedNotification;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class RoomImport implements ToModel, WithStartRow, WithValidation, ShouldQueue, WithChunkReading, WithEvents
{
    use Importable;
    
    protected $uploaded;

    public function __construct($uploaded)
    {
        $this->uploaded = $uploaded;
    }

    public function model(array $row)
    {
        return Room::withoutEvents(function () use ($row) {
            Room::create([
                'id' => Str::uuid()->toString(),
                'name' => $row[0],
                'description' => $row[1],
                'created_at'  => now(),
                'created_by'  => $this->uploaded->author->id,
            ]);
        });
    }

    public function registerEvents(): array
    {
        return [
            ImportFailed::class => function (ImportFailed $event) {
                $this->uploaded->author->notify(new ImportFailedNotification($event->getException()->failures()));
            },
        ];
    }

    public function rules(): array
    {
        return [
            '0' => Rule::unique('rooms', 'name')->whereNull('deleted_at'),
        ];
    }

    public function customValidationAttributes()
    {
        return [
            '0' => 'Nama kelas',
            '1' => 'Keterangan',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
