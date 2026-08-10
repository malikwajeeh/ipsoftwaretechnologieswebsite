<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'icon',
        'image',
        'features',
        'is_active',
        'order_number',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });

        static::updating(function ($service) {
            if ($service->isDirty('title') && empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }
}
