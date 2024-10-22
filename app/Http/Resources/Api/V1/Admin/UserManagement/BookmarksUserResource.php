<?php

namespace App\Http\Resources\Api\V1\Admin\UserManagement;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookmarksUserResource extends JsonResource
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
            "story" => [
                'title' => $this->story->title,
                'content' => $this->story->content,
                'category' => [
                    "id"   => $this->story->storyCategory->id,
                    "name" => $this->story->storyCategory->name,
                ],
                'cover' => $this->story->cover->map(function ($cover) {
                    return [
                        'file_path' => $cover->file_path,
                        'file_name' => $cover->file_name,
                        'file_type' => $cover->file_type,
                    ];
                }),
                'creator' => [
                    "id" => $this->story->user->id,
                    "name" => $this->story->user->name,
                    "avatar" => [
                        "id" => $this->story->user->avatar->id ?? null,
                        "file_name" => $this->story->user->avatar->file_name ?? null,
                        "file_path" => $this->story->user->avatar->file_path ?? null,
                        "file_type" => $this->story->user->avatar->file_type ?? null,
                    ],
                ],

            ]
        ];
    }
}
