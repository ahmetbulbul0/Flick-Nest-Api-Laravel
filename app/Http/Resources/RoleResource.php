<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'isActive' => $this->is_active,
            'permissions' => $this->whenLoaded('permissions', function() {
                return PermissionResource::collection($this->permissions);
            }),
            'pivot' => $this->when($this->pivot, function() {
                return [
                    'assignedAt' => $this->pivot->assigned_at,
                    'assignedBy' => $this->pivot->assigned_by,
                    'expiresAt' => $this->pivot->expires_at
                ];
            }),
        ];
    }
}
