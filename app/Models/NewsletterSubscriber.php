<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    protected $fillable = ['email', 'status'];

    // Scope for active subscribers
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope for search by email
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('email', 'like', '%' . $search . '%');
        }
        return $query;
    }
}
