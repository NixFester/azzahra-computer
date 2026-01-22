<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    
    public $timestamps = false;
    
    protected $fillable = [
        'category',
        'product_name',
        'brand',
        'specs',
        'price',
        'image_array',
    ];
}