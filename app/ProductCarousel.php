<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCarousel extends Model
{
    protected $fillable = [
        'path',
        'main',
        'product_id'
    ];
}
