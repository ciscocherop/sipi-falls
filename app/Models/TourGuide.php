<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourGuide extends Model
{
    protected $fillable = [
        'name', 'title', 'bio', 'photo', 'phone', 'email', 
        'years_experience', 'is_active', 'order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'years_experience' => 'integer',
        'order' => 'integer'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('name', 'asc');
    }
}
