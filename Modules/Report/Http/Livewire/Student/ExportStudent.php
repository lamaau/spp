<?php

namespace Modules\Report\Http\Livewire\Student;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Modules\Report\Exports\StudentExport;
use Modules\Master\Constants\StudentConstant;

class ExportStudent extends Component
{
    public int $sheet = 1;
    public array $statues = [];

    public function download()
    {
        $this->validate([
            'sheet' => 'required',
            'statues' => 'required',
        ]);

        $query = DB::table('students AS s')
            ->selectRaw('s.name, s.nis, s.nisn, r.name AS room, s.email, s.phone, s.religion, s.status, s.sex')
            ->join('rooms AS r', 's.room_id', '=', 'r.id')
            ->whereIn('s.status', $this->statues)
            ->get();

        return (new StudentExport($query))->download('test-' . time() . '.xlsx');
    }

    public function render()
    {
        return view('report::student.livewire.export-student', [
            'constants' => StudentConstant::labels(),
        ]);
    }
}
