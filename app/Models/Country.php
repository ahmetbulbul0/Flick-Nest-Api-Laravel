<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'countries';

    protected $fillable = [
        'iso_code_2',
        'iso_code_3',
        'iso_numeric',
        'name',
        'native_name',
        'capital',
        'region',
        'subregion',
        'phone_code',
        'currency_code',
        'currency_symbol',
        'flag',
        'flag_emoji',
        'latitude',
        'longitude',
        'timezone',
        'is_active',
        'display_order'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'is_active' => 'boolean',
        'display_order' => 'integer'
    ];

    public function userProfiles(): HasMany
    {
        return $this->hasMany(UserProfile::class, 'nationality');
    }

    public function getFullNameAttribute(): string
    {
        return $this->native_name ? "{$this->name} ({$this->native_name})" : $this->name;
    }

    public function getPhoneCodeFormattedAttribute(): string
    {
        return "+{$this->phone_code}";
    }

    public function getFlagUrlAttribute(): ?string
    {
        return $this->flag ? asset("storage/{$this->flag}") : null;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByRegion($query, string $region)
    {
        return $query->where('region', $region);
    }

    public function scopeBySubregion($query, string $subregion)
    {
        return $query->where('subregion', $subregion);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('name');
    }

    public function scopeSearch($query, string $term)
    {
        return $query->where(function ($query) use ($term) {
            $query->where('name', 'like', "%{$term}%")
                  ->orWhere('native_name', 'like', "%{$term}%")
                  ->orWhere('iso_code_2', 'like', "%{$term}%")
                  ->orWhere('iso_code_3', 'like', "%{$term}%");
        });
    }

    public static function regions(): array
    {
        return [
            'Africa',
            'Americas',
            'Asia',
            'Europe',
            'Oceania'
        ];
    }

    public static function findByIso2(string $code): ?self
    {
        return static::where('iso_code_2', strtoupper($code))->first();
    }

    public static function findByIso3(string $code): ?self
    {
        return static::where('iso_code_3', strtoupper($code))->first();
    }
}
