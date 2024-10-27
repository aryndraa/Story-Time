<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

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
}
