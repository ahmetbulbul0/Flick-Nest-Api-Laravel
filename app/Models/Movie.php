<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';

    protected $fillable = [
        "title",
        "slug",
        "description",
        "poster",
        "trailer_url",
        "duration",
        "release_date",
        "rating",
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($movie) {
            $movie->title = Str::lower($movie->title);
            $movie->description = Str::lower($movie->description);

            if (!$movie->slug) {
                $movie->slug = Str::slug($movie->title);
            }
        });
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
