<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'image',
        'gallery',
        'category_id',
        'technologies',
        'client_name',
        'project_url',
        'is_featured',
        'is_active',
        'order_number',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'gallery' => 'array',
        'technologies' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id');
    }
}
