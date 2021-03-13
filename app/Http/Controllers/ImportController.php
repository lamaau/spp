<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImportController extends Controller
{
    /**
     * Import students
     *
     * @param Request $request
     * @param Student $user
     * @return void
     */
    public function student(Request $request, Student $student)
    {
        $request->validate([
            'file' => ['required', 'max:20000', 'mimes:xls,xlsx,ods']
        ]);

        $filename = Str::uuid() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move(storage_path('app/public/students'), $filename);

        try {
            $student->import($filename);

            return response()->json([
                'success' => true,
                'message' => 'Data siswa berhasil diimport'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
