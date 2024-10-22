<?php

namespace App\Http\Controllers\Api\V1\Admin\UserManagement;

use App\Http\Controllers\Api\V1\Admin\CategoryStory\StoryCategoryController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Admin\UserManagement\BookmarksUserResource;
use App\Http\Resources\Api\V1\Admin\UserManagement\indexUserManagementResource;
use App\Http\Resources\Api\V1\Admin\UserManagement\showUserManagementResource;
use App\Http\Resources\Api\V1\Admin\UserManagement\StoriesUserResource;
use App\Models\Bookmark;
use App\Models\ProfileUser;
use App\Models\Story;
use App\Models\StoryCategory;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::query()->paginate(10);

        return indexUserManagementResource::collection($users);
    }

    public function show(User $user)
    {
        $user->load(['profileUser', 'avatar']);

        $totalBookmarks = $user->bookmarks()->count();
        $totalStories   = $user->stories()->count();

        $data = [
            'user'           => $user,
            'totalBookmarks' => $totalBookmarks,
            'totalStories'   => $totalStories,
        ];

        return showUserManagementResource::make($data);
    }

    public function bookmarksUser(User $user)
    {
        $bookmarks = Bookmark::query()
            ->with(['story.storyCategory', 'story.user', 'story.cover'])
            ->where('user_id', $user->id)
            ->paginate(6);

        return BookmarksUserResource::collection($bookmarks);
    }

    public function storiesUser(User $user)
    {
        $stories = Story::query()
            ->with(['cover', 'user', 'storyCategory'])
            ->where('user_id', $user->id)
            ->paginate(6);

        return StoriesUserResource::collection($stories);
    }



    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => "User has been deleted"
        ]);
    }
}
