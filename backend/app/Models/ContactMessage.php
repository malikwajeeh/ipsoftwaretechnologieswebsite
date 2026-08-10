<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'service',
        'budget',
        'message',
        'status',
        'admin_reply',
    ];

    protected $casts = [
        'status' => 'string',
    ];
}
