<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'email',
        'phone',
        'bio',
        'avatar',
        'social_links',
        'skills',
        'is_active',
        'order_number',
    ];

    protected $casts = [
        'social_links' => 'array',
        'skills' => 'array',
        'is_active' => 'boolean',
    ];
}
