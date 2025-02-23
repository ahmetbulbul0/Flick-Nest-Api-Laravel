<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RolePermission extends Pivot
{
    use SoftDeletes;

    protected $table = 'role_permission';

    public $incrementing = true;

    protected $fillable = [
        'role_id',
        'permission_id',
        'granted_at',
        'granted_by'
    ];

    protected $casts = [
        'granted_at' => 'datetime'
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function permission(): BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }

    public function grantedByUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'granted_by');
    }

    public function scopeByRole($query, $roleId)
    {
        return $query->where('role_id', $roleId);
    }

    public function scopeByPermission($query, $permissionId)
    {
        return $query->where('permission_id', $permissionId);
    }

    public function scopeGrantedBy($query, $grantedBy)
    {
        return $query->where('granted_by', $grantedBy);
    }
}
