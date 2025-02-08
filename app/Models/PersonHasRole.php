<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonHasRole extends Model
{
    use HasFactory;

    protected $table = 'person_has_roles';

    protected $fillable = [
        "person_id",
        "role_id",
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
