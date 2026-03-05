<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    protected $fillable = ['key', 'value', 'type', 'page', 'label'];

    // Helper method to get content by key
    public static function getByKey($key, $default = '')
    {
        $content = self::where('key', $key)->first();
        return $content ? $content->value : $default;
    }

    // Helper method to update or create content
    public static function updateContent($key, $value)
    {
        return self::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}
