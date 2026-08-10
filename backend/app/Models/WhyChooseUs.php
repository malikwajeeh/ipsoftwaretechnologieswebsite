<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'number',
        'is_active',
        'order_number',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
