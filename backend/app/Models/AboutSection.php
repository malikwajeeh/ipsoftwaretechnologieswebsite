<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
        'mission',
        'vision',
        'values',
        'experience_years',
        'features',
        'is_active',
    ];

    protected $casts = [
        'values' => 'array',
        'features' => 'array',
        'is_active' => 'boolean',
    ];
}
