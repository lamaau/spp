<?php

namespace Modules\Master\Imports;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Modules\Master\Entities\Student;
use Modules\Master\Constants\SexConstant;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Modules\Master\Constants\ReligionConstant;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class StudentImport implements ToCollection, ShouldQueue, WithStartRow, WithChunkReading
{
    use Importable;

    protected object $document;

    public function __construct(object $document)
    {
        $this->document = $document;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            Student::withoutEvents(function () use ($row) {
                Student::create([
                    'id' => Str::uuid()->toString(),
                    'name' => $row[0],
                    'room_id' => $row[1],
                    'nis' => $row[2],
                    'nisn' => $row[3],
                    'email' => $row[4],
                    'phone' => $row[5],
                    'religion' => ReligionConstant::key($row[6]),
                    'sex' => SexConstant::key($row[7]),
                    'created_by' => $this->document->author->id,
                ]);
            });
        }
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
