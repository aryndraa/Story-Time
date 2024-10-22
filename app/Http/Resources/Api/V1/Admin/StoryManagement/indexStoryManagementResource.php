<?php

namespace App\Http\Resources\Api\V1\Admin\StoryManagement;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class indexStoryManagementResource extends JsonResource
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
            "content"  => Str::limit($this->content, 50),
            "category" => [
                "id"   => $this->storyCategory->id,
                "name" => $this->storyCategory->name
            ],
            "covers"   => $this->cover->map(function ($cover) {
                return [
                    'file_path' => $cover->file_path,
                    'file_name' => $cover->file_name,
                    'file_type' => $cover->file_type,
                ];
            }),
            "creator" => [
                "id"   => $this->user->id,
                "name" => $this->user->name
            ],
        ];
    }
}
