<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\StudentRepository;

class StudentController extends Controller
{
    protected $student;
    
    public function __construct(StudentRepository $student)
    {
        $this->student = $student;
    }
    
    public function index()
    {
        return view('student.index', [
            'title' => 'Kelola Siswa',
        ]);
    }

    public function student(Request $request)
    {
        return $this->student->all($request);
    }
}
