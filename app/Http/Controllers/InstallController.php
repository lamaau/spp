<?php

namespace App\Http\Controllers;

use App\Constants\SchoolLevel;
use App\Http\Requests\InstallRequest;

class InstallController extends Controller
{
    public function index()
    {
        return view('installs.index', [
            'levels' => SchoolLevel::labels(),
        ]);
    }

    public function store(InstallRequest $request)
    {
        dd($request->all());
    }
}
