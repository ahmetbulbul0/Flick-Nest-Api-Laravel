<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SerieSeason extends Model
{
    use HasFactory;

    protected $table = 'serie_seasons';

    protected $fillable = [
        "serie_id",
        "number",
        "title",
        "slug",
        "description",
        "poster",
        "episodes_count",
        "release_date",
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($serie) {
            if (!$serie->slug) {
                if ($serie->title) {
                    $serie->slug = Str::slug($serie->number . " " . $serie->title);
                } else {
                    $serie->slug = Str::slug($serie->number);
                }
            }
        });
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
