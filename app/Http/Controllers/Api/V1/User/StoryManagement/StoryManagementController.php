<?php

namespace App\Http\Controllers\Api\V1\User\StoryManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\StoryManagement\UpSerStoryRequest;
use App\Http\Resources\Api\V1\User\StoryManagement\IndexStoryManagementResource;
use App\Http\Resources\Api\V1\User\StoryManagement\ShowStoryManagementResource;
use App\Models\File;
use App\Models\Story;
use App\Models\StoryCategory;
use App\Models\StoryView;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryManagementController extends Controller
{
    public function index(Request $request)
    {
        $userId    = auth()->id();
        $keywords  = $request->input('keyword');
        $direction = $request->input('order_direction', 'asc');
        $orderBy   = $request->input('order_by', 'id');
        $category  = $request->input('category');

        $stories = Story::query()
            ->when($keywords, function ($query) use ($keywords) {
                return $query->where('title', 'like', '%' . $keywords . '%');
            })
            ->when($category, function ($query) use ($category) {
                return $query->join('story_categories', 'stories.story_category_id', '=', 'story_categories.id')
                    ->where('story_categories.name', 'like', '%' . $category . '%');
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
        $userId = auth()->id();

        $detailStory = $story
            ->with(['covers', 'storyCategory', 'user', 'user.avatar', 'chapters'])
            ->withCount(['chapters', 'storyLikes'])
            ->withExists(['bookmark as has_bookmarked' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->withExists(['storyLikes as has_likes' => function ($query) use ($userId) {
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

        return ShowStoryManagementResource::make($detailStory);
    }

    public function store(UpSerStoryRequest $request)
    {
        $story = Story::query()->make($request->validated());
        $story->user()->associate(auth()->user());
        $story->storyCategory()->associate(StoryCategory::find($request->input('story_category_id')));
        $story->save();

        if ($covers = $request->file('covers')) {
            foreach ($covers as $cover) {
                File::UploadFile($cover, $story, 'covers', 'covers');
            }
        }

        return new ShowStoryManagementResource($story);
    }

    public function update(UpSerStoryRequest $request, Story $story)
    {
        $story->update($request->validated());
        $story->storyCategory()->associate(StoryCategory::find($request->input('story_category_id')));
        $story->save();


        $currentCoverIds = $story->covers()->pluck('id')->toArray();
        $newCovers = $request->file('covers', []);

        foreach ($newCovers as $cover) {
            if (!in_array($cover->getClientOriginalName(), $currentCoverIds)) {
                File::uploadFile($cover, $story, 'covers', 'covers');
            }
        }

        foreach ($currentCoverIds as $coverId) {
            if (!in_array($coverId, array_map(fn($file) => $file->getClientOriginalName(), $newCovers))) {
                $file = $story->covers()->where('id', $coverId)->first();
                if ($file) {
                    $filePath = $file->file_path ?? null;
                    if ($filePath && Storage::exists($filePath)) {
                        Storage::delete($filePath);
                    }

                    $file->delete();
                }
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
