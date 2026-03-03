<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [
        'fullname',
        'email',
        'date_of_travel',
        'num_adults',
        'num_children',
        'preferred_activities',
        'budget',
    ];

    protected $casts = [
        'date_of_travel' => 'date',
    ];
}
