<?php

namespace App\Http\Controllers\Api\V1\User\Bookmark;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Bookmark\BookmarkRequest;
use App\Http\Resources\Api\V1\User\Bookmark\BookmarkResource;
use App\Models\Bookmark;
use App\Models\Story;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function bookmark(Story $story)
    {
        $user     = auth()->user();
        $bookmark = Bookmark::query()
            ->where('story_id', $story->id)
            ->where('user_id', $user->id)
            ->first();

        if($bookmark) {
            $bookmark->delete();
        }

        $bookmarkStory = new Bookmark();
        $bookmarkStory->user()->associate($user);
        $bookmarkStory->story()->associate($story);
        $bookmarkStory->save();

        return response()->noContent();
    }

    public function destroy(BookmarkRequest $request)
    {
        $storyId  = $request->input('story_id');
        $bookmark = Bookmark::query()
            ->where('user_id', auth()->id())
            ->where('story_id', $storyId)
            ->first();

        $bookmark->delete();

        return response()->noContent();
    }
}
