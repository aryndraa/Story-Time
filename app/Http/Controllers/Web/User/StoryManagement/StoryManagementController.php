<?php

namespace App\Http\Controllers\Web\User\StoryManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\ActionStory\BookmarkRequest;
use App\Http\Requests\Api\V1\User\ActionStory\LikeRequest;
use App\Http\Resources\Api\V1\User\StoryManagement\IndexStoryManagementResource;
use App\Http\Resources\Api\V1\User\StoryManagement\ShowStoryManagementResource;
use App\Models\Bookmark;
use App\Models\Story;
use App\Models\Category;
use App\Models\StoryChapter;
use App\Models\StoryLikes;
use App\Models\StoryView;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class StoryManagementController extends Controller
{
    public function index()
    {
        $stories = Story::query()
            ->with('covers', 'categories', 'user', 'user.avatar')
            ->withCount('views')
            ->get();

        $newStories = Story::query()
            ->latest()
            ->with('covers', 'categories', 'user', 'user.avatar')
            ->take(6)
            ->get();

        $popularStories = Story::query()
            ->withcount('views')
            ->orderBy('views_count', 'desc')
            ->take(6)
            ->get();

        $categories = Category::query()->take(7)->get();

        $lastView = StoryView::query()->where('user_id', auth()->id())->latest('created_at')->first();

        $lastReading = $lastView ? Story::query()->find($lastView->story_id)->load('covers') : null;




        $data = [
            "stories"        => IndexStoryManagementResource::collection($stories),
            "popularStories" => IndexStoryManagementResource::collection($popularStories)->toArray(request()),
            "categories"     => $categories,
            "lastReading"    => $lastReading,
            "title"          => "Welcome"
        ];

        return view('story.index', compact('data'));
    }

    public function overview(Story $story)
    {
        $userId = auth()->id();

        $detailStory = $story
            ->with(['covers', 'categories', 'user', 'user.avatar', 'chapters'])
            ->withCount(['chapters', 'storyLikes', 'views'])
            ->withExists(['bookmark as has_bookmarked' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->withExists(['storyLikes as has_liked' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->findOrFail($story->id);

        $viewExist = StoryView::query()
            ->where('story_id', $story->id)
            ->where('user_id', $userId)
            ->exists();

        if(!$viewExist && $userId) {
            $storyView = new StoryView();
            $storyView->user()->associate($userId);
            $storyView->story()->associate($story->id);
            $storyView->save();
        }

        $data = [
            "title" => $detailStory['title'],
            "story" => ShowStoryManagementResource::make($detailStory),
        ];

        return view('story.show.overview', compact('data'));
    }

    public function chapters(Story $story)
    {

        $userId = auth()->id();

        $detailStory = $story
            ->with(['covers', 'categories', 'chapters'])
            ->withCount(['chapters', 'storyLikes', 'views'])
            ->withExists(['bookmark as has_bookmarked' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->withExists(['storyLikes as has_liked' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->findOrFail($story->id);

        $chapters = StoryChapter::query()
            ->where('story_id', $detailStory->id)
            ->get();

        $data = [
            "title" => $detailStory['title'],
            "story" => ShowStoryManagementResource::make($detailStory),
            "chapters" => IndexStoryManagementResource::collection($chapters),
        ];

        return view('story.show.chapters', compact('data'));
    }

    public function bookmark(BookmarkRequest $request)
    {
        $user = auth()->user();
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

        return redirect()->to(url()->previous());
    }

    public function like(LikeRequest $request)
    {
        $user = auth()->user();
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

        return redirect()->to(url()->previous());
    }
}

