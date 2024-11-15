<?php

namespace App\Http\Controllers\Web\User\StoryManagement;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\StoryManagement\IndexStoryManagementResource;
use App\Models\Story;
use App\Models\StoryCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
            ->with('covers', 'storyCategory')
            ->withCount('views')
            ->get();

        $allStories = Story::query()
            ->with('covers', 'storyCategory', 'user', 'user.avatar')
            ->withCount('views')
            ->paginate(4);

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
}
