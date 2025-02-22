<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        "name",
        "slug",
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($role) {
            if (!$role->slug) {
                $role->slug = Str::slug($role->name);
            }
        });
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
