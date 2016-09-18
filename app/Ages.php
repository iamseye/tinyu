<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ages extends Model
{
    protected $fillable = [
        'range'
    ];

    public function bookings()
    {
        return $this->hasMany('App\Bookings');
    }
}
