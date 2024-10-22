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

    public function StoryCategory()
    {
        return $this->belongsTo(StoryCategory::class);
    }

    public function cover()
    {
        return $this->morphMany(File::class, 'related');
    }


}
