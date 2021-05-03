<?php

namespace Modules\Master\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Master\Entities\Room;
use Illuminate\Routing\Controller;
use Modules\Master\Constants\SexConstant;
use Illuminate\Contracts\Support\Renderable;
use Modules\Master\Constants\ReligionConstant;
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
        return view('master::student.create', [
            'title' => 'Tambah Siswa',
            'sexuals' => SexConstant::labels(),
            'religions' => ReligionConstant::labels(),
            'rooms' => Room::query()->select(['id', 'name'])->get(),
        ]);
    }

    public function store(StudentRequest $request)
    {
        try {
            if ($this->student->save($request->data())) {
                notify('green', 'Berhasil!', 'Siswa telah ditambahkan.');
                return redirect()->route('master.student.index');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function edit(string $id): Renderable
    {
        return view('master::student.edit', [
            'title' => 'Tambah Siswa',
            'row' => $this->student->findOrFail($id),
            'sexuals' => SexConstant::labels(),
            'religions' => ReligionConstant::labels(),
            'rooms' => Room::query()->select(['id', 'name'])->get(),
        ]);
    }

    public function update(StudentRequest $request, string $id)
    {
        try {
            if ($this->student->update($id, $request->data())) {
                notify('green', 'Berhasil!', 'Siswa telah ditambahkan.');
                return redirect()->route('master.student.index');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
