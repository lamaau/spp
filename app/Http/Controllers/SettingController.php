<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstallRequest;
use App\Repository\Eloquent\InstallEloquent;

class SettingController extends Controller
{
    protected $install;

    public function __construct(InstallEloquent $install)
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
        return view('install');
    }

    /**
     * Store setting
     *
     * @param InstallRequest $request
     * @return void
     */
    public function store(InstallRequest $request)
    {
        if ($this->install->save($request->data())) {
            notify('success', 'Berhasil', "Aplikasi Berhasil diatur.");
            return redirect()->route('home');
        }
    }

    /**
     * Display setting 
     *
     * @return void
     */
    public function index()
    {
        return view('setting.index', [
            'title' => 'Pengaturan Aplikasi'
        ]);
    }
}
