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
            "id"         => $this->id,
            "username"   => $this->username,
            "name"       => $this->name,
            "email"      => $this->email,
            "created_at" => $this->created_at,
            "profile"    => [
                "avatar" => [
                    "file_name" => $this->avatar->file_name ?? null,
                    "file_type" => $this->avatar->file_type ?? null,
                    "file_path" => $this->avatar->file_path ?? null,
                ],
                "about" => $this->profileUser->about_me ?? null
            ],
        ];
    }
}
