<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'date_of_travel',
        'num_adults',
        'num_children',
        'preferred_activities',
        'budget',
        'status',
    ];

    protected $casts = [
        'date_of_travel' => 'date',
    ];

    // Query scopes
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeSearch($query, $search)
    {
        if (!$search) {
            return $query;
        }

        return $query->where(function ($q) use ($search) {
            $q->where('fullname', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }

    // Accessor for total guests
    public function getTotalGuestsAttribute()
    {
        return $this->num_adults + $this->num_children;
    }
}
