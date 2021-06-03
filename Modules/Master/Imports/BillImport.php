<?php

namespace Modules\Master\Imports;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Modules\Master\Entities\Bill;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Imports\Traits\DocumentEventHandler;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class BillImport implements ToModel, WithStartRow, WithValidation, ShouldQueue, WithChunkReading, WithEvents
{
    use DocumentEventHandler;
    
    protected object $document;
    protected string $module = 'Tagihan';

    public function __construct(object $document)
    {
        $this->document = $document;
    }

    public function model(array $row)
    {
        return Bill::withoutEvents(function () use ($row) {
            Bill::create([
                'id' => Str::uuid()->toString(),
                'name' => $row[0],
                'nominal' => $row[1],
                'monthly' => $row[2] === 'Ya' ? true : false,
                'description' => $row[3],
                'created_at' => now(),
                'created_by' => $this->document->author->id,
            ]);
        });
    }

    public function rules(): array
    {
        return [
            '*.0' => ['required', Rule::unique('bills', 'name')->whereNull('deleted_at')],
            '*.1' => ['required', 'integer'],
            '*.2' => ['required'],
            '*.3' => ['nullable', 'min:3'],
        ];
    }

    public function customValidationAttributes()
    {
        return [
            '0' => 'Nama',
            '1' => 'Bulanan',
            // '2' => 'Nominal',
            '3' => 'Keterangan'
        ];
    }
}
