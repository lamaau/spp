<?php

namespace Modules\GoenDataMaster\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\GoenDataMaster\Http\Requests\SettingRequest;
use Modules\GoenDataMaster\Repository\SettingRepository;

class SettingController extends Controller
{
    protected $install;

    public function __construct(SettingRepository $install)
    {
        $this->install = $install;
    }

    /**
     * Show setting|install form
     *
     * @return void
     */
    public function install()
    {
        return view('goendatamaster::install');
    }

    /**
     * Store setting
     *
     * @param SettingRequest $request
     * @return void
     */
    public function store(SettingRequest $request)
    {
        if ($this->install->save($request->data())) {
            notify('success', 'Berhasil', "Aplikasi Berhasil diatur.");
            return redirect()->route('home');
        } else {
            notify('error', 'Error', 'Terjadi kesalahan');
            return redirect()->back();
        }
    }

    /**
     * Display setting
     *
     * @return void
     */
    public function setting()
    {
        return view('setting.index', [
            'title' => 'Pengaturan Aplikasi',
        ]);
    }
}
