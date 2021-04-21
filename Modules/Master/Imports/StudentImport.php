<?php

namespace Modules\Master\Imports;

use Modules\Master\Entities\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class StudentImport implements ToModel, WithChunkReading, ShouldQueue, WithStartRow
{
    public function model(array $row)
    {
        return new Student([
            'name'  => $row[0],
            'email' => $row[1],
            'nisn'  => $row[2],
        ]);
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
