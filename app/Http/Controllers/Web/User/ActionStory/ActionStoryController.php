<?php

namespace App\Http\Controllers\Web\User\ActionStory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\ActionStory\BookmarkRequest;
use App\Http\Requests\Api\V1\User\ActionStory\LikeRequest;
use App\Models\Bookmark;
use App\Models\Story;
use App\Models\StoryLikes;
use Illuminate\Http\Request;

class ActionStoryController extends Controller
{
    public function bookmark(BookmarkRequest $request)
    {
        $user     = auth()->user();
        $story_id = $request->input('story_id');

        $bookmark = Bookmark::query()
            ->where('story_id', $story_id)
            ->where('user_id', $user->id)
            ->first();


        if($bookmark) {
            $bookmark->delete();
        } else {
            $bookmarkStory = new Bookmark();
            $bookmarkStory->user()->associate($user);
            $bookmarkStory->story()->associate($story_id);
            $bookmarkStory->save();
        }

        $story = Story::findOrFail($story_id);
        return redirect()->route('story.show', [$story]);
    }

    public function like(LikeRequest $request)
    {
        $user     = auth()->user();
        $story_id = $request->input('story_id');

        $like = StoryLikes::query()
            ->where('story_id', $story_id)
            ->where('user_id', $user->id)
            ->first();

        if($like) {
            $like->delete();
        } else {
            $likeStory = new StoryLikes();
            $likeStory->user()->associate($user);
            $likeStory->story()->associate($story_id);
            $likeStory->save();
        }

        $story = Story::findOrFail($story_id);
        return redirect()->route('story.show', [$story]);
    }
}
