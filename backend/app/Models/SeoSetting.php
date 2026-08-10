<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'title',
        'description',
        'keywords',
        'og_image',
        'canonical_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
