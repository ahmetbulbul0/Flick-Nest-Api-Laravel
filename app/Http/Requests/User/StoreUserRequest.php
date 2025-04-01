<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // User tablosu için kurallar
            "username" => ["required", "string", "max:255", "unique:users,username"],
            "email" => ["required", "email", "max:255", "unique:users,email"],
            "password" => ["required", "string", "min:8"],

            // UserProfile tablosu için kurallar
            "profile" => ["required", "array"],
            "profile.first_name" => ["required", "string", "max:255"],
            "profile.last_name" => ["required", "string", "max:255"],
            "profile.birth_date" => ["nullable", "date"],
            "profile.gender" => ["nullable", "in:male,female,other,prefer_not_to_say"],
            "profile.nationality" => ["nullable", "exists:countries,id"],
            "profile.phone_number" => ["nullable", "string", "max:20", "unique:user_profiles,phone_number"],
            "profile.profile_photo" => ["nullable", "string", "max:255"],
            "profile.biography" => ["nullable", "string"],
            "profile.additional_info" => ["nullable", "array"],

            // UserSecurity tablosu için kurallar
            "security" => ["nullable", "array"],
            "security.two_factor_enabled" => ["nullable", "boolean"],
            "security.email_verified_at" => ["nullable", "date"],

            // UserStatus tablosu için kurallar
            "status" => ["nullable", "array"],
            "status.is_active" => ["nullable", "boolean"],
            "status.is_banned" => ["nullable", "boolean"],
            "status.ban_reason" => ["nullable", "string"],
            "status.banned_by" => ["nullable", "exists:users,id"],

            // UserPreference tablosu için kurallar
            "preferences" => ["nullable", "array"],
            "preferences.preferred_language_id" => ["nullable", "exists:languages,id"],
            "preferences.theme" => ["nullable", "string", "max:50"],
            "preferences.notification_settings" => ["nullable", "array"],
            "preferences.privacy_settings" => ["nullable", "array"],
            "preferences.accessibility_settings" => ["nullable", "array"],
            "preferences.communication_preferences" => ["nullable", "array"],

            // UserSocialLink tablosu için kurallar
            "social_links" => ["nullable", "array"],
            "social_links.*.platform" => ["required", "string", "in:" . implode(",", \App\Models\UserSocialLink::platforms())],
            "social_links.*.username" => ["required", "string", "max:255"],
            "social_links.*.url" => ["required", "url", "max:255"],
            "social_links.*.is_visible" => ["nullable", "boolean"],
            "social_links.*.display_order" => ["nullable", "integer"],

            // UserRole tablosu için kurallar
            "roles" => ["nullable", "array"],
            "roles.*" => ["exists:roles,id"],
            "role_attributes" => ["nullable", "array"],
            "role_attributes.*.assigned_by" => ["nullable", "exists:users,id"],
            "role_attributes.*.expires_at" => ["nullable", "date", "after:now"],
        ];
    }

    public function messages(): array
    {
        return [
            "profile.first_name.required" => "Ad alanı zorunludur.",
            "profile.last_name.required" => "Soyad alanı zorunludur.",
            "profile.gender.in" => "Geçersiz cinsiyet seçimi.",
            "profile.nationality.exists" => "Seçilen ülke bulunamadı.",
            "profile.phone_number.unique" => "Bu telefon numarası başka bir kullanıcı tarafından kullanılıyor.",
            "social_links.*.platform.in" => "Geçersiz sosyal medya platformu.",
            "social_links.*.url.url" => "Geçersiz URL formatı.",
            "role_attributes.*.expires_at.after" => "Rol son kullanma tarihi gelecek bir tarih olmalıdır.",
        ];
    }
}
