<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoviePerson extends Model
{
    use HasFactory;

    protected $table = 'movie_persons';

    protected $fillable = [
        "movie_id",
        "person_id",
        "role_id",
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
