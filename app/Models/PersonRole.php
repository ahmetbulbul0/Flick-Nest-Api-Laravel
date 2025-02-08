<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonRole extends Model
{
    use HasFactory;

    protected $table = 'person_roles';

    protected $fillable = [
        "name",
        "slug",
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($personRole) {
            if (!$personRole->slug) {
                $personRole->slug = Str::slug($personRole->name);
            }
        });
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
