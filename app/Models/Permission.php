<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'group',
        'is_active'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($permission) {
            if (!$permission->slug) {
                $permission->slug = Str::slug($permission->name);
            }
        });
    }

    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_permission')->withPivot(['granted_at', 'granted_by'])->withTimestamps();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'role_permission')->through('roles');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByGroup($query, string $group)
    {
        return $query->where('group', $group);
    }
}
