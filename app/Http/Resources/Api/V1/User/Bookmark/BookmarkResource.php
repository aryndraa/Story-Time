<?php

namespace App\Http\Resources\Api\V1\User\Bookmark;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookmarkResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          "user" => $this->user_id,
          "story" => $this->story_id
        ];
    }
}
