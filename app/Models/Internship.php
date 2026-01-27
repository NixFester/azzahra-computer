<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $table = 'internship';
    
    protected $fillable = [
        'type',
        'image_url',
        'title',
    ];
}