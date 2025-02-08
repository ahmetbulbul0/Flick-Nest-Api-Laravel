<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeriePerson extends Model
{
    use HasFactory;

    protected $table = 'serie_persons';

    protected $fillable = [
        "serie_id",
        "person_id",
        "role_id",
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
