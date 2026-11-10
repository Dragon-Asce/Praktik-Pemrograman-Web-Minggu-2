<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\MatakuliahResource;
use App\Models\Matakuliah;
use Illuminate\Http\JsonResponse;

class MatakuliahAPIController extends BaseController
{
    /**
     * Daftar mata kuliah — output JSON.
     */
    public function index(): JsonResponse
    {
        $matakuliahs = Matakuliah::orderBy('kode_mk')->get();

        return $this->sendResponse(
            MatakuliahResource::collection($matakuliahs),
            'Matakuliah retrieved successfully.'
        );
    }

    /**
     * Detail satu mata kuliah.
     */
    public function show(int $id): JsonResponse
    {
        $matakuliah = Matakuliah::find($id);

        if (is_null($matakuliah)) {
            return $this->sendError('Matakuliah not found.');
        }

        return $this->sendResponse(
            new MatakuliahResource($matakuliah),
            'Matakuliah retrieved successfully.'
        );
    }
}
