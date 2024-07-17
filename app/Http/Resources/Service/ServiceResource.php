<?php

namespace App\Http\Resources\Service;

use App\Http\Resources\User\WorkerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'price' => $this->resource->price,
            'is_active' => $this->resource->is_active,
            'image' => $this->resource->getFirstMediaUrl('service_banner_image', 'preview'),
            'worker' => new WorkerResource($this->whenLoaded('worker')),
            'serviceCategory' => new ServiceCategoryResource($this->whenLoaded('serviceCategory')),
        ];
    }
}
