<?php

namespace App\Http\Controllers\Web\User\ChapterStory;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\ChapterStory\ShowChapterResource;
use App\Models\ChapterView;
use App\Models\Story;
use App\Models\StoryChapter;
use Illuminate\Http\Request;

class ChapterStoryController extends Controller
{
    public function show(Story $story, StoryChapter $chapter)
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

        $getStory = Story::query()
            ->where('id', $story->id)
            ->first();

        $data = [
            'chapter'    => ShowChapterResource::make($chapter),
            'storyTitle' => $getStory->title,
            'storyID'    => $getStory->id,
            "title"       => "Welcome"
        ];

        return  view("story.chapter.show", compact('data'));
    }
}
