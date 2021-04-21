<?php

namespace Modules\Master\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Master\Http\Requests\StudentRequest;
use Modules\Master\Repository\StudentRepository;

class StudentController extends Controller
{
    /** @var StudentRepository */
    protected $student;

    public function __construct(StudentRepository $student)
    {
        $this->student = $student;
    }

    public function index(): Renderable
    {
        return view('master::student.index', ['title' => 'Daftar Siswa']);
    }

    public function create(): Renderable
    {
        return view('master::student.create', ['title' => 'Tambah Siswa']);
    }

    public function store(StudentRequest $request)
    {
        try {
            if ($this->student->save($request->data())) {
                dd('success');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
