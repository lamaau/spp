<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class PaymentController extends Controller
{
    /**
     * View payment page
     *
     * @return Renderable
     */
    public function __invoke(): Renderable
    {
        return view('payment::index', ['title' => 'Kelola Pembayaran']);
    }
}
