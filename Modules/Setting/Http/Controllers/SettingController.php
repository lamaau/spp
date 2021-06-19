<?php

namespace Modules\Setting\Http\Controllers;

use App\Constants\SchoolLevel;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Setting\Repository\SettingRepository;

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

    public function role()
    {
        return view('setting::role.index', [
            'title' => 'Hak akses'
        ]);
    }

    public function general(SettingRepository $setting)
    {
        return view('setting::general.index', [
            'title' => 'Umum',
            'setting' => $setting->general(),
            'levels' => SchoolLevel::labels(),
        ]);
    }
}
