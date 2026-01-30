<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $table = 'internship';

    protected $guarded = [];

    public function scopeBatch($query)
    {
        return $query->where('type', 'batch');
    }

    public function scopeBrochure($query)
    {
        return $query->where('type', 'brochure')
            ->orderBy('order');
    }

    protected $fillable = [
        'type',
        'image_url',
        'title',
    ];
}
