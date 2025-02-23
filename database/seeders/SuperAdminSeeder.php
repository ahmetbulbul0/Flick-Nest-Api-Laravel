<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use App\Models\UserProfile;
use App\Models\UserStatus;
use App\Models\UserSecurity;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::where('name', 'super admin')->first();

        // Tüm izinleri Super Admin rolüne ata
        $superAdminRole->permissions()->attach(
            Permission::get()->pluck('id')->toArray(),
            ['granted_at' => now(), 'granted_by' => 'system']
        );

        // Super Admin Kullanıcısını Oluştur
        $superAdmin = User::create([
            'username' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password' => 'password',
        ]);

        // Super Admin Profilini Oluştur
        UserProfile::create([
            'user_id' => $superAdmin->id,
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'biography' => 'System Super Administrator'
        ]);

        // Super Admin Güvenlik Ayarlarını Oluştur
        UserSecurity::create([
            'user_id' => $superAdmin->id,
            'email_verified_at' => now(),
            'two_factor_enabled' => true
        ]);

        // Super Admin Durumunu Oluştur
        UserStatus::create([
            'user_id' => $superAdmin->id,
            'is_active' => true,
            'is_banned' => false
        ]);

        // Super Admin Rolünü Ata
        $superAdmin->roles()->attach($superAdminRole->id, [
            'assigned_at' => now(),
            'assigned_by' => 'system'
        ]);
    }
}
