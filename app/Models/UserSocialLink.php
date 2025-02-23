<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSocialLink extends Model
{
    use HasFactory;

    protected $table = 'user_social_links';

    protected $fillable = [
        'user_id',
        'platform',
        'username',
        'url',
        'is_visible',
        'display_order'
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'display_order' => 'integer'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setPlatformAttribute($value): void
    {
        $this->attributes['platform'] = strtolower($value);
    }

    public function getIconAttribute(): string
    {
        return match($this->platform) {
            'facebook' => 'fab fa-facebook',
            'twitter' => 'fab fa-twitter',
            'instagram' => 'fab fa-instagram',
            'linkedin' => 'fab fa-linkedin',
            'github' => 'fab fa-github',
            'youtube' => 'fab fa-youtube',
            default => 'fas fa-link'
        };
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    public function scopeByPlatform($query, string $platform)
    {
        return $query->where('platform', strtolower($platform));
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order');
    }

    public static function platforms(): array
    {
        return [
            'facebook',
            'twitter',
            'instagram',
            'linkedin',
            'github',
            'youtube'
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($socialLink) {
            if (!isset($socialLink->display_order)) {
                $maxOrder = static::where('user_id', $socialLink->user_id)
                    ->max('display_order');
                $socialLink->display_order = ($maxOrder ?? 0) + 1;
            }
        });
    }
}
