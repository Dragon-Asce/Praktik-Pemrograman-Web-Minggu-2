<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use Illuminate\Http\JsonResponse;

class MahasiswaAPIController extends BaseController
{
    /**
     * Daftar mahasiswa — output JSON.
     */
    public function index(): JsonResponse
    {
        $mahasiswas = Mahasiswa::orderBy('nim')->get();

        return $this->sendResponse(
            MahasiswaResource::collection($mahasiswas),
            'Mahasiswa retrieved successfully.'
        );
    }

    /**
     * Detail satu mahasiswa.
     */
    public function show(int $id): JsonResponse
    {
        $mahasiswa = Mahasiswa::find($id);

        if (is_null($mahasiswa)) {
            return $this->sendError('Mahasiswa not found.');
        }

        return $this->sendResponse(
            new MahasiswaResource($mahasiswa),
            'Mahasiswa retrieved successfully.'
        );
    }
}
