<?php

namespace App\Http\Controllers\Web\User\StoryManagement;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\StoryManagement\IndexStoryManagementResource;
use App\Models\Story;
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
            ->when($keywords, function ($query) use ($keywords) {
                return $query->where('title', 'like', '%' . $keywords . '%');
            })
            ->when($category, function ($query) use ($category) {
                return $query->whereHas('storyCategory', function ($query) use ($category) {
                    $query->where('name', 'like', '%' . $category . '%');
                });
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
            ->get();

        $data = [
            "stories" => IndexStoryManagementResource::collection($stories),
            "title"   => "Welcome"
        ];

        return view('story.index', compact('data'));
    }
}
