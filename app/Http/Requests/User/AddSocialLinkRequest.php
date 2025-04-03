<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class AddSocialLinkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "platform" => ["required", "string", "in:" . implode(",", \App\Models\UserSocialLink::platforms())],
            "username" => ["required", "string", "max:255"],
            "url" => ["required", "url", "max:255"],
            "is_visible" => ["nullable", "boolean"],
            "display_order" => ["nullable", "integer"],
        ];
    }
}
