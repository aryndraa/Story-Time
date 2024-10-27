<?php

namespace App\Http\Resources\Api\V1\User\UserStory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class MyStoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" => Str::limit($this->content, 50),
            "has_bookmarked" => $this->has_bookmarked,
            "story_category" => [
                "id" => $this->storyCategory->id,
                "name" => $this->storyCategory->name,
            ],
            "user" => [
                "id" => $this->user->id,
                "username" => $this->user->username,
                "avatar" => [
                    "file_path" => $this->user->avatar->file_url ?? null,
                    "file_name" => $this->user->avatar->file_name ?? null,
                    "file_type" => $this->user->avatar->file_type ?? null,
                ]
            ],
            "cover" => $this->covers->map(function ($cover) {
                return [
                    'file_path' => $cover->file_url  ?? null,
                    'file_name' => $cover->file_name ?? null,
                    'file_type' => $cover->file_type ?? null,
                ];
            }),
            "created_at" => $this->created_at
        ];
    }
}
