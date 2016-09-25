<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPics extends Model
{
    protected $fillable = [
        'path',
        'main',
        'product_id'
    ];
}
