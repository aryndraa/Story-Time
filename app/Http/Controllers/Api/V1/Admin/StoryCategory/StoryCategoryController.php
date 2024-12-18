<?php

namespace App\Http\Controllers\Api\V1\Admin\StoryCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\CategoryStory\UpSerCategoryRequest;
use App\Http\Resources\Api\V1\Admin\CategoryStory\indexCategoryResource;
use App\Http\Resources\Api\V1\Admin\CategoryStory\showCategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class StoryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keywords  = $request->input('keyword');
        $direction = $request->input('order_direction', 'asc');
        $orderBy   = $request->input('order_by', 'id');

        $storyCategory = Category::query()
            ->when($keywords, function ($query) use ($keywords) {
                return $query->where('name', 'like', '%' . $keywords . '%');
            })
            ->orderBy($orderBy, $direction)
            ->simplePaginate(6);

        return indexCategoryResource::collection($storyCategory);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpSerCategoryRequest $request)
    {
        $storyCategory = Category::query()->create($request->validated());

        return new showCategoryResource($storyCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpSerCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return new showCategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->noContent();
    }
}
