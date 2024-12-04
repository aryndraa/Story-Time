<?php

namespace App\Http\Controllers\Api\V1\User\ChapterStory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\ChapterStory\UpSerChapterRequest;
use App\Http\Resources\Api\V1\User\ChapterStory\IndexChapterResource;
use App\Http\Resources\Api\V1\User\ChapterStory\ShowChapterResource;
use App\Models\ChapterView;
use App\Models\Story;
use App\Models\StoryChapter;
use Illuminate\Http\Request;

class ChapterStoryController extends Controller
{
    public function index(Story $story)
    {
        $userId = auth()->id();

        $chapters = $story
            ->chapters()
            ->withExists(['chapterView as view' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }])
            ->get();

        return IndexChapterResource::collection($chapters);
    }

    public function show(StoryChapter $chapter)
    {
        $userId = auth()->id();

        $viewExist = ChapterView::query()
            ->where('user_id', $userId)
            ->where('story_chapter_id', $chapter->id)
            ->exists();

        if (!$viewExist && $userId) {
            $view = new ChapterView();
            $view->user()->associate($userId);
            $view->storyChapter()->associate($chapter);
            $view->save();
        }

        return  ShowChapterResource::make($chapter);
    }


    public function store(UpSerChapterRequest $request, Story $story)
    {
        $chapter = $story->chapters()->create($request->validated());
        $chapter->story()->associate($story);
        $chapter->save();

        return response()->json($chapter);
    }
}
