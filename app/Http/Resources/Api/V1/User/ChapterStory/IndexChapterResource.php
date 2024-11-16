<?php

namespace App\Http\Resources\Api\V1\User\ChapterStory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexChapterResource extends JsonResource
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
            "status_view" => $this->view,
            "created_at" => $this->created_at
        ];
    }
}
