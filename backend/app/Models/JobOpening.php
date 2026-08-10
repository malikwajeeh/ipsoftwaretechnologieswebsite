<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'department',
        'type',
        'location',
        'description',
        'requirements',
        'salary_range',
        'is_active',
    ];

    protected $casts = [
        'requirements' => 'array',
        'is_active' => 'boolean',
    ];
}
