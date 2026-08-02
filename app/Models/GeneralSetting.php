<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'logo',
        'contact_email',
        'contact_phone',
        'address',
        'google_maps',
        'hero_title',
        'hero_description',
        'hero_image',
        'social_links',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];

    protected static function booted()
    {
        static::saved(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('general_settings');
        });
        
        static::deleted(function ($model) {
            \Illuminate\Support\Facades\Cache::forget('general_settings');
        });
    }
}
