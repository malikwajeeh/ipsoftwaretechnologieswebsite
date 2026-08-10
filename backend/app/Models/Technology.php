<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'color',
        'category',
        'proficiency',
        'description',
        'is_active',
        'order_number',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
