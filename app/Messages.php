<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    //
    protected $fillable = [
        'name',
        'phone',
        'email',
        'title',
        'content',
        'status'
    ];
}
