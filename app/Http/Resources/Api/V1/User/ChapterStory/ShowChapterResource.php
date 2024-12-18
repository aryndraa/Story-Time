<?php

namespace App\Http\Resources\Api\V1\User\ChapterStory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowChapterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content
        ];
    }
}
