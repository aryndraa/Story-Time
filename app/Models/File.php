<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_path',
        'file_type',
    ];

    public function getFileUrlAttribute()
    {
        if ($this->file_path) {
            return asset('storage/' . $this->file_path);
        }

        return secure_asset(null);
    }

    public static function scopeUploadFile(UploadedFile $file, Model $model, $relation, $directory)
    {
        $filePath = $file->store($directory, 'public');
        $fileName = $file->getClientOriginalName();
        $fileType = $file->getMimeType();

        return $model->$relation()->create([
            'file_name' => $fileName,
            'file_path' => $filePath,
            'file_type' => $fileType,
        ]);
    }


    public function related()
    {
        return $this->morphTo();
    }

}
