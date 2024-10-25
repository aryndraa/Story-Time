<?php

namespace App\Http\Resources\Api\V1\User\UserProfile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
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
            "name"     => $this->name,
            "email"    => $this->email,
            "about_me" => $this->profileUser->about_me,
            "avatar"   => [
                "file_name" => $this->avatar->file_name,
                "file_type" => $this->avatar->file_type,
                "file_path" => $this->avatar->file_url,
            ]
        ];
    }
}
