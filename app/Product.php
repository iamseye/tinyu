<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'eng_name',
        'description',
        'content',
        'category',
    ];

    public function productPics()
    {
        return $this->hasMany('App\ProductPics');
    }

    public function productCarousels()
    {
        return $this->hasMany('App\ProductCarousel');
    }

    public function productAreaPics()
    {
        return $this->hasMany('App\ProductAreaPic');
    }
}
