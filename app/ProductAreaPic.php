<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAreaPic extends Model
{
    protected $fillable = [
        'path',
        'main',
        'product_id'
    ];
}
