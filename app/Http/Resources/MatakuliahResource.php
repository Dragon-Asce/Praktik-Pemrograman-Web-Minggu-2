<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatakuliahResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'kode_mk'    => $this->kode_mk,
            'nama_mk'    => $this->nama_mk,
            'sks'        => $this->sks,
            'created_at' => $this->created_at?->format('d/m/Y'),
            'updated_at' => $this->updated_at?->format('d/m/Y'),
        ];
    }
}
