<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\LevelRequest;
use App\Repository\LevelRepository;
use Illuminate\Http\JsonResponse;

class LevelController extends Controller
{
    protected $level;

    public function __construct(LevelRepository $level)
    {
        $this->level = $level;
    }

    public function levels(Request $request)
    {
        return $this->level->all($request);
    }

    public function index()
    {
        return view('level.index', ['title' => 'Kelola Level Kelas']);
    }

    public function store(LevelRequest $request): JsonResponse
    {
        if ($this->level->save($request->data())) {
            return response()->json([
                'success' => true,
                'message' => 'Data level berhasil ditambah',
            ], Response::HTTP_OK);
        }

        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan',
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function edit(string $id)
    {
        $response = $this->level->edit($id);

        return response()->json([
            'success' => true,
            'data' => $response,
        ], Response::HTTP_OK);
    }

    public function update(LevelRequest $request, string $id)
    {
        if ($this->level->update($id, $request->data())) {
            return response()->json([
                'success' => true,
                'message' => 'Data level berhasil diubah',
            ], Response::HTTP_OK);
        }
    }
}
