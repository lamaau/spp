<?php

namespace Modules\Master\Imports;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Modules\Master\Entities\Room;
use Illuminate\Support\Collection;
use Modules\Master\Entities\Student;
use Modules\Master\Constants\SexConstant;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Imports\Traits\DocumentEventHandler;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Modules\Master\Constants\ReligionConstant;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Modules\Master\Constants\StudentConstant;

class StudentImport implements ToCollection, ShouldQueue, WithValidation, WithStartRow, WithChunkReading, WithEvents
{
    use DocumentEventHandler;
    
    protected object $document;
    protected string $module = 'Siswa';

    public function __construct(object $document)
    {
        $this->document = $document;
    }

    /**
     * This method just import student when class room already created
     *
     * @param Collection $rows
     * @return void
     */
    public function collection(Collection $rows)
    {
        $tmp = [];
        foreach ($rows as $key => $row) {
            $tmp[] = strtolower($row[1]);
        }

        $rooms = Room::query()->selectRaw('`id`, LOWER(`name`) as name')
            ->whereRaw("`name` IN('" . implode("', '", array_unique($tmp)) . "')");

        $roomName = $rooms->pluck('name')->toArray();
        $roomId = $rooms->pluck('id')->toArray();

        $arrgs = array_intersect($tmp, $roomName);
        $items = array_combine($roomName, $roomId);

        foreach ($arrgs as $key => $row) {
            if (isset($rows[$key])) {
                Student::withoutEvents(function () use ($items, $rows, $key) {
                    Student::create([
                        'id' => Str::uuid()->toString(),
                        'name' => $rows[$key][0],
                        'room_id' => $items[strtolower($rows[$key][1])],
                        'nis' => $rows[$key][2],
                        'nisn' => $rows[$key][3],
                        'email' => $rows[$key][4],
                        'password' => Hash::make($rows[$key][2]),
                        'phone' => $rows[$key][5],
                        'status' => StudentConstant::ACTIVE,
                        'religion' => ReligionConstant::key($rows[$key][6]),
                        'sex' => SexConstant::key($rows[$key][7]),
                        'created_by' => $this->document->author->id,
                    ]);
                });
            }
        }
    }

    public function rules(): array
    {
        return [
            '*.0' => ['required'],
            '*.1' => ['required'],
            '*.2' => ['nullable', Rule::unique('students', 'nis')->whereNull('deleted_at')],
            '*.3' => ['nullable', Rule::unique('students', 'nisn')->whereNull('deleted_at')],
            '*.4' => ['nullable'],
            '*.5' => ['nullable'],
            '*.6' => ['required'],
            '*.7' => ['required'],
        ];
    }

    public function customValidationAttributes()
    {
        return [
            '0' => 'Nama siswa',
            '1' => 'Kelas',
            '2' => 'Nis',
            '3' => 'Nisn',
            '4' => 'Email',
            '5' => 'Hp',
            '6' => 'Agama',
            '7' => 'Jenis Kelamin',
        ];
    }
}
