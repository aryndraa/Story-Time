<?php

namespace App\Http\Controllers\Api\V1\User\Bookmark;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Bookmark\BookmarkRequest;
use App\Models\Bookmark;
use App\Models\Story;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function add(BookmarkRequest $request)
    {
        $bookmark = new Bookmark();
        $bookmark->user()->associate(auth()->user());
        $bookmark->story()->associate(Story::find($request->input('story_id')));
        $bookmark->save();

        return response()->json([
            "bookmark" => $bookmark,
        ]);
    }

    public function destroy(BookmarkRequest $request)
    {
        $storyId = $request->input('story_id');

        $bookmark = Bookmark::query()
            ->where('user_id', auth()->id())
            ->where('story_id', $storyId)
            ->first();

        if ($bookmark) {
            $bookmark->delete();

            return response()->noContent();
        }

        return response()->json([
           "message" => "Bookmark not found",
        ], 404);
    }
}
