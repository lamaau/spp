<?php

namespace Modules\Master\Http\Livewire\Student;

use App\Datatables\Traits\Notify;
use Livewire\Component;
use Modules\Master\Http\Requests\StudentRequest;

class Form extends Component
{
    use Notify;

    /** @var null|string */
    public $pid;
    public $name;
    public $nis;
    public $nisn;
    public $sex;
    public $email;
    public $phone;
    public $religion;
    public $room_id;

    /** @var array */
    public $rooms;
    public $sexuals;
    public $religions;

    protected StudentRequest $request;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->request = new StudentRequest;
    }

    public function mount($student = null)
    {
        if (!is_null($student)) {
            $this->pid = $student->id;
            $this->name = $student->name;
            $this->nis = $student->nis;
            $this->nisn = $student->nisn;
            $this->sex = $student->sex;
            $this->email = $student->email;
            $this->phone = $student->phone;
            $this->religion = $student->religion;
            $this->room_id = $student->room_id;
        }
    }

    public function resetValue(): void
    {
        $this->name = null;
        $this->nis = null;
        $this->nisn = null;
        $this->sex = null;
        $this->email = null;
        $this->phone = null;
        $this->religion = null;
        $this->room_id = null;
        $this->emit('clear');
    }

    public function save()
    {
        $validated = $this->validate($this->request->rules(), [], $this->request->attributes());
        if (resolve(\Modules\Master\Repository\StudentRepository::class)->save($validated)) {
            $this->resetValue();
            return $this->success('Berhasil!', 'Siswa berhasil ditambahkan.');
        }

        return $this->error('Oops!', 'Terjadi kesalahan saat menambah siswa.');
    }

    public function update()
    {
        $validated = $this->validate($this->request->rules($this->pid), [], $this->request->attributes());
        if (resolve(\Modules\Master\Repository\StudentRepository::class)->update($this->pid, $validated)) {
            return $this->success('Berhasil!', 'Siswa berhasil diubah.');
        }

        return $this->error('Oops!', 'Terjadi kesalahan saat mengubah siswa.');
    }

    public function render()
    {
        return view('master::student.livewire.form', [
            'roomCount' => resolve(\Modules\Master\Repository\RoomRepository::class)->all()->count(),
            'studentCount' => resolve(\Modules\Master\Repository\StudentRepository::class)->all()->count()
        ]);
    }
}
