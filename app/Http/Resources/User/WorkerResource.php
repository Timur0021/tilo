<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->resource->name,
            'surname' => $this->resource->surname,
            'salary' => $this->resource->salary,
            'image' => $this->resource->getFirstMediaUrl('avatar_worker', 'preview'),
            'birth_date' => $this->resource->birth_date,
        ];
    }
}
