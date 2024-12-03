<?php

namespace App\Http\Resources\Api\V1\User\StoryManagement;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ShowStoryManagementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"       => $this->id,
            "title"    => $this->title,
            "synopsis"  => $this->synopsis,
            'category' => $this->categories->map(function ($category) {
                return [
                    "id"   => $category->id,
                    "name" => $category->name
                ];
            }),
            "covers"   => $this->covers->map(function ($cover) {
                return [
                    'file_path' => $cover->file_path,
                ];
            }),
            "user" => [
                "id"   => $this->user->id,
                "name" => $this->user->name
            ],
            "total_chapters" => $this->chapters_count,
            "total_likes" => $this->story_likes_count,
            "created_at" => $this->created_at,
            "bookmarked" => $this->has_bookmarked,
            "liked" => $this->has_likes,
            "chapters" => $this->chapters->map(function ($story) {
                return [
                    "id"         => $story->id,
                    "title"      => $story->title,
                    "created_at" => $story->created_at,
                ];
            })
        ];
    }
}
