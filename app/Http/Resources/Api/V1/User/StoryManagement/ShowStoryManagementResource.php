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
            "content"  => $this->content,
            'category' => [
                "id"   => $this->storyCategory->id,
                "name" => $this->storyCategory->name,
            ],
            "covers"   => $this->covers->map(function ($cover) {
                return [
                    'file_path' => $cover->file_path        ,
                ];
            }),
            "user" => [
                "id"   => $this->user->id,
                "name" => $this->user->name
            ],
            "created_at" => $this->created_at
        ];
    }
}
