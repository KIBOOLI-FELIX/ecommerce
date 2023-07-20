<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        'name',
        'slug',
        'meta_description',
        'meta_title',
        'description',
        'category_id',
        'small_description',
        'brand',
        'description',
        'meta_keyword',
        'selling_price',
        'original_price',
        'quantity',
        'trending',
        'status'
    ];
}
