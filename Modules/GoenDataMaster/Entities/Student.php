<?php

namespace Modules\GoenDataMaster\Entities;

use App\Imports\StudentImport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Utils\Uuid;

class Student extends Model
{
    use HasFactory, Uuid;

    protected $guarded = [];

    /**
     * Import the students
     *
     * @param string $filename
     * @return void
     */
    public function import($filename)
    {
        $file = storage_path("app/public/students/{$filename}");
        Excel::queueImport(new StudentImport(), $file);
    }
}
