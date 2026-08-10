<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_name',
        'title',
        'subtitle',
        'description',
        'image',
        'is_active',
        'order_number',
        'settings',
    ];

    protected $casts = [
        'settings' => 'array',
        'is_active' => 'boolean',
    ];
}
