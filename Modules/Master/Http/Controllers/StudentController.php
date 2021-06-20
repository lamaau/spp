<?php

namespace Modules\Master\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Master\Constants\SexConstant;
use Illuminate\Contracts\Support\Renderable;
use Modules\Master\Constants\StudentConstant;
use Modules\Master\Repository\RoomRepository;
use Modules\Master\Constants\ReligionConstant;
use Modules\Master\Http\Requests\StudentRequest;
use Modules\Master\Repository\StudentRepository;

class StudentController extends Controller
{
    /** @var RoomRepository */
    protected $room;

    /** @var StudentRepository */
    protected $student;

    public function __construct(
        RoomRepository $room,
        StudentRepository $student
    ) {
        $this->room = $room;
        $this->student = $student;
    }

    public function settingRoom(): Renderable
    {
        return view('master::student.room.index', [
            'title' => 'Kelola Kenaikan Kelas',
            'rooms' => $this->room->all(),
        ]);
    }

    public function settingStatus()
    {
        return view('master::student.status.index', [
            'title' => 'Kelola Status'
        ]);
    }

    public function index(): Renderable
    {
        return view('master::student.index', [
            'title' => 'Daftar Siswa',
            'items' => StudentConstant::labels(),
        ]);
    }

    public function create(): Renderable
    {
        return view('master::student.create', [
            'title' => 'Tambah Siswa',
            'rooms' => $this->room->all()->toArray(),
            'sexuals' => SexConstant::labels(),
            'religions' => ReligionConstant::labels(),
        ]);
    }

    public function edit(string $id): Renderable
    {
        return view('master::student.edit', [
            'title' => 'Tambah Siswa',
            'rooms' => $this->room->all()->toArray(),
            'sexuals' => SexConstant::labels(),
            'student' => $this->student->findOrFail($id),
            'religions' => ReligionConstant::labels(),
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
