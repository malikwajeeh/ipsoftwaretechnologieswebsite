<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key_name',
        'value',
        'group_name',
    ];

    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = static::where('key_name', $key)->first();

        return $setting ? $setting->value : $default;
    }

    public static function set(string $key, mixed $value, string $group = 'general'): static
    {
        return static::updateOrCreate(
            ['key_name' => $key],
            ['value' => $value, 'group_name' => $group]
        );
    }
}
