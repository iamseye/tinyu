<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndexPics extends Model
{
    protected $fillable = [
        'name',
        'path',
        'order',
    ];
}
