<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'roles';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active'
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
        'deleted_at'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = strtolower($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_role')->withPivot(['assigned_at', 'assigned_by', 'expires_at'])->withTimestamps();
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_permission')->withPivot(['granted_at', 'granted_by'])->withTimestamps();
    }

    public function hasPermission(string $permission): bool
    {
        return $this->permissions()->where('name', $permission)->exists();
    }

    public function hasAnyPermission(array $permissions): bool
    {
        return $this->permissions()->whereIn('name', $permissions)->exists();
    }

    public function hasAllPermissions(array $permissions): bool
    {
        return $this->permissions()->whereIn('name', $permissions)->count() === count($permissions);
    }

    public function grantPermission(Permission $permission, string $grantedBy = 'system'): void
    {
        if (!$this->hasPermission($permission->name)) {
            $this->permissions()->attach($permission->id, [
                'granted_at' => now(),
                'granted_by' => $grantedBy
            ]);
        }
    }

    public function revokePermission(Permission $permission): void
    {
        $this->permissions()->detach($permission->id);
    }

    public function syncPermissions(array $permissions, string $grantedBy = 'system'): void
    {
        $syncData = collect($permissions)->mapWithKeys(function ($permission) use ($grantedBy) {
            return [$permission => [
                'granted_at' => now(),
                'granted_by' => $grantedBy
            ]];
        });

        $this->permissions()->sync($syncData);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeWithPermission($query, string $permission)
    {
        return $query->whereHas('permissions', function ($query) use ($permission) {
            $query->where('name', $permission);
        });
    }

    public function scopeWithAnyPermissions($query, array $permissions)
    {
        return $query->whereHas('permissions', function ($query) use ($permissions) {
            $query->whereIn('name', $permissions);
        });
    }

    public function scopeWithAllPermissions($query, array $permissions)
    {
        return $query->whereHas('permissions', function ($query) use ($permissions) {
            $query->whereIn('name', $permissions);
        }, '=', count($permissions));
    }
}
