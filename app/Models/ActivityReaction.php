<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityReaction extends Model
{
    protected $fillable = ['activity_key', 'emoji', 'session_id'];
}
