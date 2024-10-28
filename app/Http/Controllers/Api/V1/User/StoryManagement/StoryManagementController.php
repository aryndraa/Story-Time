<?php

namespace App\Http\Controllers\Api\V1\User\StoryManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\StoryManagement\UpSerStoryManagementRequest;
use App\Http\Resources\Api\V1\User\StoryManagement\IndexStoryManagementResource;
use App\Http\Resources\Api\V1\User\StoryManagement\ShowStoryManagementResource;
use App\Models\File;
use App\Models\Story;
use App\Models\StoryCategory;
use App\Models\StoryView;
use App\Models\User;
use Illuminate\Http\Request;

class StoryManagementController extends Controller
{
    public function index(Request $request)
    {
            $userId    = auth()->id();
            $keywords  = $request->input('keyword');
            $direction = $request->input('order_direction', 'asc');
            $orderBy   = $request->input('order_by', 'id');

        $stories = Story::query()
            ->when($keywords, function ($query) use ($keywords) {
                return $query->where('name', 'like', '%' . $keywords . '%');
            })
            ->with('covers', 'storyCategory', 'user', 'user.avatar')
            ->withExists(['bookmark as has_bookmarked' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->withCount('views')
            ->orderBy(
                $orderBy === 'popular' ? 'views_count' : $orderBy,
                $orderBy === 'popular' ? 'desc' : $direction
            )
            ->simplePaginate(6);

        return IndexStoryManagementResource::collection($stories);
    }

    public function show(Story $story)
    {
        $story->load(['covers', 'storyCategory', 'user', 'user.avatar']);
        $userId = auth()->id();

        $viewExist = StoryView::query()
            ->where('story_id', $story->id)
            ->where('user_id', $userId)
            ->exists();

        if(!$viewExist) {
            $storyView = new StoryView();
            $storyView->story()->associate($story->id);
            $storyView->user()->associate($userId);
            $storyView->save();
        }

        return new ShowStoryManagementResource($story);
    }

    public function store(UpSerStoryManagementRequest $request)
    {
        $story = Story::query()->make($request->validated());
        $story->user()->associate(auth()->user());
        $story->storyCategory()->associate(StoryCategory::find($request->input('story_category_id')));
        $story->save();

        if ($covers = $request->file('covers')) {
            foreach ($covers as $cover) {
                File::scopeUploadFile($cover, $story, 'covers', 'covers');
            }
        }

        return new ShowStoryManagementResource($story);
    }

    public function update(UpSerStoryManagementRequest $request, Story $story)
    {
        $story->update($request->validated());
        $story->storyCategory()->associate(StoryCategory::find($request->input('story_category_id')));
        $story->save();

        if ($covers = $request->file('covers')) {
            foreach ($covers as $cover) {
                File::scopeUploadFile($cover, $story, 'covers', 'covers');
            }
        }

        return new ShowStoryManagementResource($story);
    }

    public function destroy(Story $story)
    {
        $story->delete();

        return response()->noContent();
    }


}
