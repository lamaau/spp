<?php

namespace Modules\Master\Imports;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Modules\Master\Entities\Room;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Imports\Traits\DocumentEventHandler;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class RoomImport implements ToModel, WithStartRow, WithValidation, ShouldQueue, WithChunkReading, WithEvents
{
    use DocumentEventHandler;
    
    protected object $document;
    protected string $module = 'Kelas';

    public function __construct(object $document)
    {
        $this->document = $document;
    }

    public function model(array $row)
    {
        return Room::withoutEvents(function () use ($row) {
            Room::create([
                'id' => Str::uuid()->toString(),
                'name' => $row[0],
                'description' => $row[1],
                'created_at' => now(),
                'created_by' => $this->document->author->id,
            ]);
        });
    }

    public function rules(): array
    {
        return [
            '*.0' => ['required', Rule::unique('rooms', 'name')->whereNull('deleted_at')],
            '*.1' => ['nullable', 'min:3'],
        ];
    }

    public function customValidationAttributes()
    {
        return [
            '0' => 'Nama kelas',
            '1' => 'Keterangan',
        ];
    }
}
