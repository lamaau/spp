<?php

namespace Modules\GoenDataMaster\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\GoenDataMaster\Repository\StudentRepository;

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
        return view('goendatamaster::student.index', ['title' => 'Kelola Siswa']);
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
