<?php

namespace App\Http\Controllers\Client;

use App\Models\Room;
use App\Models\User;
use App\Enums\Gender;
use App\Enums\Status;
use App\Enums\Religion;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;
use App\Http\Controllers\Controller;
use App\Inertable\Client\Master\StudentTable;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('client/student/index')
            ->with([
                'genders' => Gender::labels(),
                'religions' => Religion::labels(),
                'rooms' => Room::get(['id', 'name']),
            ])
            ->inertable(new StudentTable)->title(__('Siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        DB::transaction(function () use ($request) {
            $user = User::create($request->getUserCredential());

            Student::create(array_merge($request->getStudentCredential(), [
                'user_id' => $user->id,
                'created_by' => user_id(),
                'school_id' => school_id(),
                'status' => Status::ACTIVE(),
            ]));
        });

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
