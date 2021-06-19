<?php

namespace Modules\Report\Http\Livewire\Student;

use Livewire\Component;
use App\Datatables\Traits\Notify;
use Modules\Master\Entities\Room;
use Illuminate\Support\Facades\DB;
use Modules\Report\Exports\StudentExport;
use Modules\Master\Constants\StudentConstant;

class ExportStudent extends Component
{
    use Notify;
    
    public $room;
    public int $sheet = 1;
    public array $statues = [];
    
    public function download()
    {
        $this->validate([
            'room' => 'required',
            'sheet' => 'required',
            'statues' => 'required',
        ]);

        $query = DB::table('students AS s')
            ->selectRaw('s.name, s.nis, s.nisn, r.name AS room, s.email, s.phone, s.religion, s.status, s.sex')
            ->join('rooms AS r', 's.room_id', '=', 'r.id')
            ->when($this->room == '*' ? false : true, function ($query) {
                $query->where('s.room_id', $this->room);
            })
            ->whereIn('s.status', $this->statues)
            ->get();

        if ($query->count()) {
            return (new StudentExport($query))->download('test-' . time() . '.xlsx');
        }

        return $this->error('', 'Siswa tidak ditemukan');
    }

    public function render()
    {
        return view('report::student.livewire.export', [
            'rooms' => Room::query()->select(['id', 'name'])->get(),
            'constants' => StudentConstant::labels(),
        ]);
    }
}
