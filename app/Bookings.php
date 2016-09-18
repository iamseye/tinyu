<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $fillable = [
        'name',
        'nationality',
        'phone',
        'email',
        'paid',
        'situation'
    ];

    public function age()
    {
        return $this->belongsTo('App\Ages');
    }

    public function tour()
    {
        return $this->belongsTo('App\Tours','tours_id');
    }
}