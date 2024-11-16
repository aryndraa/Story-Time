<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryChapter extends Model
{
    use HasFactory;

    protected $fillable = [
          'title',
          'content'
        ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    public function chapterView()
    {
        return $this->hasMany(ChapterView::class);
    }
}
