<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'step_number',
        'is_active',
        'order_number',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
