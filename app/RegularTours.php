<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegularTours extends Model
{
    protected $fillable = [
        'title',
        'week',
        'tour_start_date',
        'tour_end_date'
    ];

    public function tours()
    {
        return $this->hasMany('App\Tour');
    }
}
