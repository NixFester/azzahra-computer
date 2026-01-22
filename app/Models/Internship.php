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
        'order'
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    // Scope for batch type
    public function scopeBatch($query)
    {
        return $query->where('type', 'batch');
    }

    // Scope for brochure type
    public function scopeBrochure($query)
    {
        return $query->where('type', 'brochure')->orderBy('order');
    }
}