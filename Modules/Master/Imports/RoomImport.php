<?php

namespace Modules\Master\Imports;

use Illuminate\Validation\Rule;
use Modules\Master\Entities\Room;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class RoomImport implements ToModel, WithChunkReading, WithStartRow, WithValidation
{
    use Importable;

    public function model(array $row)
    {
        return new Room([
            'name' => $row[0],
            'description' => $row[1],
            'created_at'  => now(),
            'created_by'  => Auth::id(),
        ]);
    }

    public function rules(): array
    {
        return [
            '0' => Rule::unique('rooms', 'name')->whereNull('deleted_at'),
        ];
    }

    public function customValidationAttributes()
    {
        return ['0' => 'Nama kelas'];
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
