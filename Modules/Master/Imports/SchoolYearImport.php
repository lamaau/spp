<?php

namespace Modules\Master\Imports;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Modules\Master\Entities\SchoolYear;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class SchoolYearImport implements ToModel, WithChunkReading, WithStartRow, WithValidation
{
    use Importable;

    public function model(array $row)
    {
        return new SchoolYear([
            'year' => $row[0],
            'bill' => $row[1],
            'description' => $row[2],
            'created_at' => now(),
            'created_by' => Auth::id(),
        ]);
    }

    public function rules(): array
    {
        return [
            '0' => ['required', Rule::unique('school_years', 'year')->whereNull('deleted_at')],
            '1' => ['required'],
        ];
    }

    public function customValidationAttributes()
    {
        return [
            '0' => 'Tahun ajaran',
            '1' => 'Biaya'
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
