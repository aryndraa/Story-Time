<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_me'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
