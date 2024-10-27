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
            "content"        => Str::limit($this->content, 50),
            "has_bookmarked" => $this->has_bookmarked,
            "category"       => [
                "id"   => $this->storyCategory->id,
                "name" => $this->storyCategory->name
            ],
            "covers" => $this->covers->map(function ($cover) {
                return [
                    'file_path' => $cover->file_url,
                    'file_name' => $cover->file_name,
                    'file_type' => $cover->file_type,
                ];
            }),
            "user" => [
                "id"     => $this->user->id,
                "name"   => $this->user->name,
                "avatar" => [
                    "file_path" => $this->user->avatar->file_url ?? null,
                    "file_name" => $this->user->avatar->file_name ?? null,
                    "file_type" => $this->user->avatar->file_type ?? null,
                ]
            ],
        ];
    }
}
