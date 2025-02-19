<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Platform extends Model
{
    use HasFactory;

    protected $table = "platforms";

    protected $fillable = [
        "name",
        "slug",
        "logo",
        "website"
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($platform) {
            if (!$platform->slug) {
                $platform->slug = Str::slug($platform->name);
            }
        });
    }

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];
}
