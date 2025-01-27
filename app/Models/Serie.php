<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Serie extends Model
{
    use HasFactory;

    protected $table = 'series';

    protected $fillable = [
        "title",
        "slug",
        "description",
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($serie) {
            if (!$serie->slug) {
                $serie->slug = Str::slug($serie->title);
            }
        });
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
