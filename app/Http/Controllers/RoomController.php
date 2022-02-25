<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Inertia\Response;
use App\Http\Requests\RoomRequest;
use Illuminate\Support\Facades\DB;
use App\Inertable\Master\RoomTable;
use Illuminate\Http\RedirectResponse;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return inertia('room/index')->inertable(new RoomTable)->title(__('Daftar Kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RoomRequest  $request
     * @return RedirectResponse
     */
    public function store(RoomRequest $request): RedirectResponse
    {
        DB::transaction(fn () => Room::create($request->validated()));

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
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RoomRequest  $request
     * @param  Room $room
     * @return \Illuminate\Http\Response
     */
    public function update(Room $room, RoomRequest $request)
    {
        DB::transaction(fn () => $room->update($request->validated()));

        return back();
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
