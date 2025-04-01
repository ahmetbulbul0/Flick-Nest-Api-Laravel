<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSecurityResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'twoFactorEnabled' => $this->two_factor_enabled,
            'emailVerifiedAt' => $this->email_verified_at,
            'lastLoginAt' => $this->last_login_at,
            'lastLoginIp' => $this->last_login_ip,
            'loginHistory' => $this->login_history,
        ];
    }
}
