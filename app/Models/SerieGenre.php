<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SerieGenre extends Model
{
    use HasFactory;

    protected $table = 'serie_genres';

    protected $fillable = [
        "serie_id",
        "genre_id",
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
