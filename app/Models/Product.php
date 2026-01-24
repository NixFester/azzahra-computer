<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'products';
    
    protected $fillable = [
        'category',
        'product_name',
        'brand',
        'specs',
        'price',
        'image_array',
        'description',
        'stock',
        'is_active',
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'is_active' => 'boolean',
        'image_array' => 'array',
    ];
    
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    public function scopeSearch($query, $search)
    {
        return $query->where('product_name', 'like', "%{$search}%")
                     ->orWhere('category', 'like', "%{$search}%")
                     ->orWhere('brand', 'like', "%{$search}%");
    }
}