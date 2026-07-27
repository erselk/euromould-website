<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'slug',
        'description',
        'description_en',
        'image',
        'sort',
    ];

    protected $casts = [
        'sort' => 'integer',
    ];

    protected static function booted()
    {
        static::creating(function ($service) {
            if (empty($service->sort)) {
                $service->sort = static::max('sort') + 1;
            }
        });
    }

    public function getTranslated($field)
    {
        $enField = $field . '_en';
        if (app()->getLocale() === 'en' && !empty($this->$enField)) {
            return $this->$enField;
        }
        return $this->$field;
    }
}
