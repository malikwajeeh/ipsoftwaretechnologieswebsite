<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_role',
        'client_company',
        'client_avatar',
        'rating',
        'testimonial',
        'is_active',
        'order_number',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_active' => 'boolean',
    ];
}
