<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Iklan extends Model
{
    protected $fillable = [
        'type',
        'title',
        'description',
        'image_path',
        'link',
        'is_active',
        'order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image_path);
    }
}