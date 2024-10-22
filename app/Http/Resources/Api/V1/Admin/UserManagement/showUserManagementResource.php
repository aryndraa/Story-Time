<?php

namespace App\Http\Resources\Api\V1\Admin\UserManagement;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class showUserManagementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"         => $this->resource['user']->id,
            "username"   => $this->resource['user']->username,
            "name"       => $this->resource['user']->name,
            "email"      => $this->resource['user']->email,
            "created_at" => $this->resource['user']->created_at,
            "avatar" => [
                "file_name" => $this->resource['user']->avatar->file_name ?? null,
                "file_type" => $this->resource['user']->avatar->file_type ?? null,
                "file_path" => $this->resource['user']->avatar->file_path ?? null,
            ],
            "profile" => [
                "id" => $this->resource['user']->profileUser->id ?? null,
                "about_me" => $this->resource['user']->profileUser->about_me ?? null,
            ],
            "total_bookmarks" => $this->resource['totalBookmarks'],
            "total_stories" => $this->resource['totalStories']
        ];
    }
}
