<?php

namespace Modules\Setting\Http\Controllers;

use App\Entities\Role;
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

    public function general(SettingRepository $setting)
    {
        return view('setting::general.index', [
            'title' => 'Pengaturan Umum',
            'setting' => $setting->general(),
            'levels' => SchoolLevel::labels(),
        ]);
    }

    public function role()
    {        
        return view('setting::role.role-permission', [
            'title' => 'Pengaturan Hak akses'
        ]);
    }

    public function operator()
    {
        return view('setting::role.operator', [
            'title' => 'Kelola Pengguna',
            'roles' => Role::withoutSuperAdmin()->get()->toArray()
        ]);
    }
}
