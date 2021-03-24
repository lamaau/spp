<?php

namespace Modules\GoenDataMaster\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return Renderable
     */
    public function __invoke(): Renderable
    {
        return view('goendatamaster::invoice.index', ['title' => 'Halaman Invoice']);
    }
}
