<?php

namespace App\Http\Controllers\Api\V1\Admin\StoryManagement;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Admin\StoryManagement\indexStoryManagementResource;
use App\Http\Resources\Api\V1\Admin\StoryManagement\showStoryManagementResource;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryManagementController extends Controller
{
    public function index(Request $request)
    {
        $keywords  = $request->input('keyword');
        $direction = $request->input('order_direction', 'asc');
        $orderBy   = $request->input('order_by', 'id');

        $stories = Story::query()
            ->when($keywords, function ($query) use ($keywords) {
                return $query->where('name', 'like', '%' . $keywords . '%');
            })
            ->with('covers', 'storyCategory', 'user')
            ->orderBy($orderBy, $direction)
            ->paginate(6);

        return indexStoryManagementResource::collection($stories);
    }

    public function show(Story $story)
    {
        $story->load(['covers', 'storyCategory', 'user']);

        return new showStoryManagementResource($story);
    }

    public function destroy(Story $story)
    {
        $story->delete();

        return response()->noContent();
    }
}
