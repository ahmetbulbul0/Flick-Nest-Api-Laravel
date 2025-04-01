<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'group' => $this->group,
            'isActive' => $this->is_active,
            'roles' => $this->whenLoaded('roles', function() {
                return $this->roles->map(function($role) {
                    return [
                        'id' => $role->id,
                        'name' => $role->name,
                        'slug' => $role->slug,
                        'pivot' => [
                            'grantedAt' => $role->pivot->granted_at,
                            'grantedBy' => $role->pivot->granted_by
                        ]
                    ];
                });
            }),
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'deletedAt' => $this->when($this->deleted_at, $this->deleted_at),
        ];
    }
}
