<?php

namespace App\Http\Controllers\Web\User\StoryManagement;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\StoryManagement\IndexStoryManagementResource;
use App\Http\Resources\Api\V1\User\StoryManagement\ShowStoryManagementResource;
use App\Models\Story;
use App\Models\StoryCategory;
use App\Models\StoryView;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StoryManagementController extends Controller
{
    public function index()
    {
        $stories = Story::query()
            ->with('covers', 'storyCategory')
            ->withCount('views')
            ->get();

        $newStories = Story::query()
            ->latest()
            ->with('covers', 'storyCategory', 'user', 'user.avatar')
            ->take(8)
            ->get();

        $popularStories = Story::query()
            ->withcount('views')
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->orderBy('views_count', 'desc')
            ->get();

        $categories = StoryCategory::query()->get();

        $data = [
            "stories"        => IndexStoryManagementResource::collection($stories)->toArray(request()),
            "newStories"     => IndexStoryManagementResource::collection($newStories),
            "popularStories" => IndexStoryManagementResource::collection($popularStories),
            "categories"     => $categories,
            "title"          => "Welcome"
        ];

        return view('story.index', compact('data'));
    }

    public function show(Story $story)
    {
        $userId = auth()->id();

        $detailStory = $story
            ->with(['covers', 'storyCategory', 'user', 'user.avatar', 'chapters'])
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

        return view('story.show', compact('data'));
    }
}

