<?php

namespace App\Http\Resources\Main;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutUsResource extends JsonResource
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
            'images' => $this->resource->getMedia('about_us_banner')->map(function ($media) {
                return $media->getUrl('preview');
            })->toArray(),
            'advantages' => AdvantageResource::collection($this->whenLoaded('advantages')),
        ];
    }
}
