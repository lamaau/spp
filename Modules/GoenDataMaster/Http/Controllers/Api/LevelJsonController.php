<?php

namespace Modules\GoenDataMaster\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller;
use Modules\GoenDataMaster\Http\Requests\LevelRequest;
use Modules\GoenDataMaster\Repository\LevelRepository;

class LevelJsonController extends Controller
{
    protected $level;

    public function __construct(LevelRepository $level)
    {
        $this->level = $level;
    }

    public function levels(Request $request): LengthAwarePaginator
    {
        return $this->level->all($request);
    }

    public function store(LevelRequest $request): JsonResponse
    {
        $this->level->save($request->data());

        try {
            return response()->json([
                'success' => true,
                'message' => 'Data level berhasil ditambah',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function edit(string $id): JsonResponse
    {
        $response = $this->level->edit($id);

        try {
            return response()->json([
                'success' => true,
                'data'    => $response,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function update(LevelRequest $request, string $id): JsonResponse
    {
        $this->level->update($id, $request->data());

        try {
            return response()->json([
                'success' => true,
                'message' => 'Data level berhasil diubah',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function destroy(Request $request): JsonResponse
    {
        if ($request->id) {
            $this->level->delete($request->id);
        }

        try {
            return response()->json([
                'success' => true,
                'message' => 'Data level berhasil dihapus',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], $e->getCode());
        }
    }
}
