<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'synopsis',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($story) {
            $story->covers()->delete();
            $story->views()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function storyCategory()
    {
        return $this->belongsTo(StoryCategory::class);
    }

    public function covers()
    {
        return $this->morphMany(File::class, 'related');
    }

    public function bookmark()
    {
        return $this->hasOne(Bookmark::class);
    }

    public function views()
    {
        return $this->hasMany(StoryView::class);
    }

    public function chapters()
    {
        return $this->hasMany(StoryChapter::class);
    }

    public function storyLikes()
    {
        return $this->hasMany(StoryLikes::class);
    }
}
