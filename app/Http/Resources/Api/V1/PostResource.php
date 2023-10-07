<?php

namespace App\Http\Resources\Api\V1;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->key,
            'type' => 'post',
            'attributes' => [
                'title' => $this->title,
                'body' => $this->body,
                'description' => $this->description,
                'published' => $this->published,
            ],
            'relationships' => [
                'user' => new UserResource($this->whenLoaded('user'))
            ],
            'links' => [
                'self' => route('api:v1:posts:show', $this->key),
            ]
        ];
    }
}
