<?php

namespace Modules\Master\Http\Controllers;

use Illuminate\Support\Str;
use App\Constants\SchoolLevel;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Master\Http\Requests\InstallRequest;
use Modules\Master\Repository\InstallRepository;

class InstallController extends Controller
{
    protected $install;

    public function __construct(InstallRepository $install)
    {
        $this->install = $install;
    }

    public function view(): Renderable
    {
        return view('master::install', [
            'title' => 'Atur aplikasi anda.',
            'levels' => SchoolLevel::labels(),
        ]);
    }

    public function setup(InstallRequest $request)
    {
        $file = $request->file('logo');
        $name = Str::slug($request->name) . '-' . time() . '.' . $file->getClientOriginalExtension();
        $filename = $file->storeAs('schools', $name);
        $request->logo = $filename;

        if ($this->install->setup($request->data())) {
            notify('success', 'Berhasil', 'Aplikasi berhasil diatur');
            return redirect()->route('dashboard');
        }

        notify('failed', 'Gagal', 'Terjadi kesalahan saat mengatur aplikasi');
        return redirect()->back();
    }
}
