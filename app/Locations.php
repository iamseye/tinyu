<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $fillable = [
        'name'
    ];

    public function tours()
    {
        return $this->hasMany('App\Tours');
    }
}
