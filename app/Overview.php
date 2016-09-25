<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    //
    protected $fillable = [
        'website_title',
        'keyword',
        'description',
        'logo',
        'favicon',
        'about',
        'contact_phone',
        'contact_email',
        'contact_add',
        'facebook',
        'line',
        'instagram'
    ];
}
