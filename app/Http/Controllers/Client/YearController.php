<?php

namespace App\Http\Controllers\Client;

use App\Models\Year;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Requests\YearRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Inertable\Client\Master\YearTable;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return inertia('client/year/index')->inertable(new YearTable)->title(__('Tahun ajaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  YearRequestRequest  $request
     * @return RedirectResponse
     */
    public function store(YearRequest $request): RedirectResponse
    {
        DB::transaction(fn () => Year::create($request->validated()));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
