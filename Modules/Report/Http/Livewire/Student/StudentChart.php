<?php

namespace Modules\Report\Http\Livewire\Student;

use Livewire\Component;
use Modules\Utils\Month;
use Illuminate\Support\Facades\DB;
use Modules\Master\Constants\StudentConstant;

class StudentChart extends Component
{
    public string $chartId = "student-chart";

    public function query()
    {
        $query = DB::table('students')->selectRaw('COUNT(`id`) as total, status, MONTH(`created_at`) as month')->whereNull('deleted_at')->groupBy(DB::raw('`status`, month'))->get()->toArray();

        $active = [];
        $graduate = [];
        $move = [];
        $quit = [];
        foreach ($query as $result) {
            $key = str_pad($result->month, 2, '0', STR_PAD_LEFT);
            if ($result->status === StudentConstant::ACTIVE) {
                $active[$key] = $result;
            }

            if ($result->status === StudentConstant::GRADUATE) {
                $graduate[$key] = $result;
            }

            if ($result->status === StudentConstant::MOVE) {
                $move[$key] = $result;
            }

            if ($result->status === StudentConstant::QUIT) {
                $quit[$key] = $result;
            }
        }

        $activeResult = [];
        $graduateResult = [];
        $moveResult = [];
        $quitResult = [];
        foreach (Month::number() as $m) {
            $activeResult['name']   = "Aktif";
            $activeResult['data'][] = isset($active[$m]) ? $active[$m]->total : 0;

            $graduateResult['name']   = "Lulus";
            $graduateResult['data'][] = isset($graduate[$m]) ? $graduate[$m]->total : 0;

            $moveResult['name']   = "Pindah";
            $moveResult['data'][] = isset($move[$m]) ? $move[$m]->total : 0;

            $quitResult['name']   = "Berhenti";
            $quitResult['data'][] = isset($quit[$m]) ? $quit[$m]->total : 0;
        }

        return [$activeResult, $graduateResult, $moveResult, $quitResult];
    }

    public function render()
    {
        $chartData = $this->query();

        return view('report::student.livewire.student-chart', [
            'series' => json_encode($chartData),
            'categories' => json_encode(Month::prefixName()),
        ]);
    }
}
