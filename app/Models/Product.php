<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Disable timestamps
    public $timestamps = false;

    protected $fillable = [
        'category',
        'product_name',
        'brand',
        'specs',
        'price',
        'image_array'
    ];
}