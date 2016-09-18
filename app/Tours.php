<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tours extends Model
{
    protected $fillable = [
        'title',
        'description',
        'picture',
        'meeting_point',
        'peopleNum',
        'tour_type',
        'price',
        'early_price',
        'schedule_type',
        'weekly_time_id',
        'tour_start_time',
        'tour_end_time',
        'offShelf',
        'regular_tour_id',
        'location_id',
        'booking_id',
    ];

    public function location()
    {
        return $this->belongsTo('App\Locations');
    }

    public function regular_tour()
    {
        return $this->belongsTo('App\RegularTours');
    }

    public function bookings()
    {
        return $this->hasMany('App\Bookings');
    }

}