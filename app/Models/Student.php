<?php

namespace App\Models;

use App\Utils\Uuid;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
