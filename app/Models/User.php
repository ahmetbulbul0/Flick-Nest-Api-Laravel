<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = "users";

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'deleted_at',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->profile->first_name} {$this->profile->last_name}";
    }

    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    public function security(): HasOne
    {
        return $this->hasOne(UserSecurity::class);
    }

    public function status(): HasOne
    {
        return $this->hasOne(UserStatus::class);
    }

    public function preferences(): HasOne
    {
        return $this->hasOne(UserPreference::class);
    }

    public function socialLinks(): HasMany
    {
        return $this->hasMany(UserSocialLink::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_role')->withPivot(['assigned_at', 'assigned_by', 'expires_at'])->withTimestamps();
    }

    public function hasRole(string $role): bool
    {
        return $this->roles()->where('name', $role)->where(function ($query) {$query->whereNull('expires_at')->orWhere('expires_at', '>', now()); })->exists();
    }

    public function hasAnyRole(array $roles): bool
    {
        return $this->roles()->whereIn('name', $roles)->where(function ($query) { $query->whereNull('expires_at')->orWhere('expires_at', '>', now()); })->exists();
    }
    public function hasAllRoles(array $roles): bool
    {
        return $this->roles()->whereIn('name', $roles)->where(function ($query) { $query->whereNull('expires_at') ->orWhere('expires_at', '>', now()); }) ->count() === count($roles);
    }

    public function getAllPermissions(): array
    {
        return $this->roles()->with('permissions')->get()->pluck('permissions')->flatten()->pluck('name')->unique()->toArray();
    }

    public function hasPermission(string $permission): bool
    {
        return $this->roles()->whereHas('permissions', function ($query) use ($permission) { $query->where('name', $permission); })->exists();
    }

    public function scopeActive($query)
    {
        return $query->whereHas('status', function ($query) { $query->where('is_active', true) ->where('is_banned', false); });
    }

    public function scopeBanned($query)
    {
        return $query->whereHas('status', function ($query) { $query->where('is_banned', true); });
    }
}
