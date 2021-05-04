<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Master\Entities\Student;
use Illuminate\Contracts\Support\Renderable;
use Modules\Master\Entities\Bill;

class PaymentController extends Controller
{
    /**
     * View payment page
     *
     * @return Renderable
     */
    public function __invoke(): Renderable
    {
        return view('payment::index', [
            'title' => 'Kelola Pembayaran',
            'bills' => Bill::query()->select(['id', 'name'])->get(),
            'students' => Student::query()->select(['id', 'name', 'nis', 'nisn'])->get(),
        ]);
    }
}
