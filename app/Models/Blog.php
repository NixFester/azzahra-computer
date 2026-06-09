<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = ['title', 'date', 'body', 'image', 'alt_text'];

    protected $casts = [
        'date' => 'date',
    ];

    public function getBodyHtmlAttribute()
    {
        return Str::markdown($this->body);
    }
}
