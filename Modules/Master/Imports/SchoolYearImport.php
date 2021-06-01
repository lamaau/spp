<?php

namespace Modules\Master\Imports;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Modules\Master\Entities\SchoolYear;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\ImportFailed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Notifications\ImportFailedNotification;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class SchoolYearImport implements ToModel, WithStartRow, WithValidation, ShouldQueue, WithChunkReading, WithEvents
{
    use Importable;

    protected $document;

    public function __construct($document)
    {
        $this->document = $document;
    }

    public function model(array $row)
    {
        return SchoolYear::withoutEvents(function () use ($row) {
            SchoolYear::create([
                'id' => Str::uuid()->toString(),
                'year' => $row[0],
                'description' => $row[1],
                'created_at' => now(),
                'created_by' => $this->document->author->id,
            ]);
        });
    }

    public function registerEvents(): array
    {
        return [
            ImportFailed::class => function (ImportFailed $event) {
                $this->document->author->notify(new ImportFailedNotification($event->getException()->failures()));
            },
        ];
    }

    public function rules(): array
    {
        return [
            '*.0' => ['required', Rule::unique('school_years', 'year')->whereNull('deleted_at')],
            '*.1' => ['nullable', 'min:3'],
        ];
    }

    public function customValidationAttributes()
    {
        return [
            '0' => 'Tahun ajaran',
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
