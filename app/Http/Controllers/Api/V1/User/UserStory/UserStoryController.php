<?php

namespace App\Http\Controllers\Api\V1\User\UserStory;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\UserStory\MyStoryResource;
use App\Models\Story;

class UserStoryController extends Controller
{
    public function myStories()
    {
        $userId = auth()->id();

        $stories = Story::query()
            ->where('user_id', $userId)
            ->with('covers', 'storyCategory', 'user', 'user.avatar')
            ->withExists(['bookmark as has_bookmarked' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->simplePaginate(4);

        return MyStoryResource::collection($stories);
    }

    public function bookmarkedStories()
    {
        $userId = auth()->id();

        $stories = Story::query()
            ->whereHas('bookmark', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->with('covers', 'storyCategory', 'user', 'user.avatar')
            ->withExists(['bookmark as has_bookmarked' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->simplePaginate(4);

        return MyStoryResource::collection($stories);
    }
}
