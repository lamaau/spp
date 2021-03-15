<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Repository\StudentRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentController extends Controller
{
    protected $student;

    public function __construct(StudentRepository $student)
    {
        $this->student = $student;
    }

    /**
     * Data for table student
     *
     * @param Request $request
     * @return void
     */
    public function students(Request $request): LengthAwarePaginator
    {
        return $this->student->all($request);
    }

    /**
     * View of student
     *
     * @return View
     */
    public function index(): View
    {
        return view('student.index', ['title' => 'Kelola Siswa']);
    }

    /**
     * View create of student
     *
     * @return View
     */
    public function create(): View
    {
        return view('student.create', ['title' => 'Tambah siswa']);
    }
}
