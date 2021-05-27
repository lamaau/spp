<?php

namespace Modules\Setting\Http\Controllers;

use App\Constants\SchoolLevel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Repository\GeneralRepository;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('setting::index', [
            'title' => 'Pengaturan'
        ]);
    }

    public function general(GeneralRepository $setting)
    {
        return view('setting::general.index', [
            'title' => 'Umum',
            'setting' => $setting->first(),
            'levels' => SchoolLevel::labels(),
        ]);
    }

    public function automation()
    {
        return view('setting::automation.index', [
            'title' => 'Otomatisasi'
        ]);
    }
}
