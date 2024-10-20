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

    public function user() {
        return $this->hasOne(User::class);
    }

    public function avatar() {
        return $this->morphOne(File::class, 'relate');
    }
}
