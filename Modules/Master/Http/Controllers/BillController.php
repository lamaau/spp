<?php

namespace Modules\Master\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Master\Entities\SchoolYear;

class BillController extends Controller
{
    /**
     * View bill
     *
     * @return Renderable
     */
    public function __invoke()
    {
        return view('master::bill.index', [
            'title' => 'Daftar Tagihan',
            'years' => SchoolYear::query()->select(['id', 'year'])->get(),
        ]);
    }
}
