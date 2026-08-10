<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'badge_text',
        'video_url',
        'button_text',
        'button_link',
        'secondary_button_text',
        'secondary_button_link',
        'is_active',
        'order_number',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
