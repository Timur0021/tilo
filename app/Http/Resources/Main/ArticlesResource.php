<?php

namespace App\Http\Resources\Main;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticlesResource extends JsonResource
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
            'second_title' =>  $this->resource->second_title,
            'image' => $this->resource->getFirstMediaUrl('image_article', 'preview'),
            'description' => $this->resource->description,
            'published' => $this->resource->published,
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
