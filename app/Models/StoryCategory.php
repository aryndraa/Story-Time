<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function stories()
    {
        return $this->belongsTo(Story::class);
    }
}
