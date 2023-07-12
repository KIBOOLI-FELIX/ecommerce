<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable=[
        'name',
        'description',
        'meta_description',
        'meta_keyword',
        'meta_title',
        'slug',
        'image',
        'status'
    ];
}