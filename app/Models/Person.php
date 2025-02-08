<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        "first_name",
        "last_name",
        "birth_date",
        "bio",
        "profile_photo",
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
