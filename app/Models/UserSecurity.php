<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSecurity extends Model
{
    use HasFactory;

    protected $table = 'user_securities';

    protected $fillable = [
        'user_id',
        'two_factor_enabled',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'email_verified_at',
        'remember_token',
        'last_login_at',
        'last_login_ip',
        'login_history'
    ];

    protected $hidden = [
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token'
    ];

    protected $casts = [
        'two_factor_enabled' => 'boolean',
        'two_factor_recovery_codes' => 'encrypted:array',
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'login_history' => 'encrypted:json'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isEmailVerified(): bool
    {
        return $this->email_verified_at !== null;
    }

    public function hasTwoFactorEnabled(): bool
    {
        return $this->two_factor_enabled;
    }

    public function addLoginHistory(string $ip): void
    {
        $history = $this->login_history ?? [];
        array_unshift($history, [
            'ip' => $ip,
            'timestamp' => now()->toDateTimeString(),
            'user_agent' => request()->userAgent()
        ]);

        // Keep only last 10 login attempts
        $this->login_history = array_slice($history, 0, 10);
        $this->last_login_at = now();
        $this->last_login_ip = $ip;
        $this->save();
    }

    public function scopeVerified($query)
    {
        return $query->whereNotNull('email_verified_at');
    }

    public function scopeUnverified($query)
    {
        return $query->whereNull('email_verified_at');
    }

    public function scopeWithTwoFactor($query)
    {
        return $query->where('two_factor_enabled', true);
    }
}
