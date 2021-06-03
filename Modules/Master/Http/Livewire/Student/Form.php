<?php

namespace Modules\Master\Http\Livewire\Student;

use App\Datatables\Traits\Notify;
use Livewire\Component;
use Modules\Master\Http\Requests\StudentRequest;

class Form extends Component
{
    use Notify;

    /** @var null|string */
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

    public function render()
    {
        return view('master::student.livewire.form', [
            'roomCount' => resolve(\Modules\Master\Repository\RoomRepository::class)->all()->count(),
            'studentCount' => resolve(\Modules\Master\Repository\StudentRepository::class)->all()->count()
        ]);
    }
}
