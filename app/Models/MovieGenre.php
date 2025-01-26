<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovieGenre extends Model
{
    use HasFactory;

    protected $table = 'movie_genres';

    protected $fillable = [
        "movie_id",
        "genre_id",
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
