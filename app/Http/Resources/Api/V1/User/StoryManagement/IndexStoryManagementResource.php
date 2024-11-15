<?php

namespace App\Http\Resources\Api\V1\User\StoryManagement;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class IndexStoryManagementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"             => $this->id,
            "title"          => $this->title,
            "synopsis"        => Str::limit($this->synopsis, 100),
            "has_bookmarked" => $this->has_bookmarked,
            "category"       => [
                "id"   => $this->storyCategory->id,
                "name" => $this->storyCategory->name
            ],
            "covers" => $this->covers->map(function ($cover) {
                return [
                    'file_path' => $cover->file_url,
                ];
            }),
            "user" => [
                "id"     => $this->user->id,
                "name"   => $this->user->name,
                "avatar" => $this->user->avatar->file_url ?? null,
            ],
            "views" => $this->views_count
        ];
    }
}
