<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';

    protected $fillable = [
        'name',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($genre) {
            if (!$genre->slug) {
                $genre->slug = Str::slug($genre->name);
            }
        });
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
