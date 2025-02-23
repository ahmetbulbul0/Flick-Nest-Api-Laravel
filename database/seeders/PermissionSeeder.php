<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionGroups = [
            // Kullanıcı Yönetimi
            'user-management' => [
                'list-users' => 'Kullanıcıları listeleme',
                'view-user-details' => 'Kullanıcı detaylarını görüntüleme',
                'create-user' => 'Yeni kullanıcı oluşturma',
                'edit-user' => 'Kullanıcı bilgilerini düzenleme',
                'delete-user' => 'Kullanıcı silme',
                'restore-user' => 'Silinmiş kullanıcıyı geri getirme',
                'force-delete-user' => 'Kullanıcıyı kalıcı silme',
                'ban-user' => 'Kullanıcıyı yasaklama',
                'unban-user' => 'Kullanıcı yasağını kaldırma',
                'impersonate-user' => 'Kullanıcı hesabına geçiş yapma',
                'export-users' => 'Kullanıcı verilerini dışa aktarma',
            ],

            // Profil Yönetimi
            'profile-management' => [
                'edit-user-profile' => 'Kullanıcı profilini düzenleme',
                'upload-profile-photo' => 'Profil fotoğrafı yükleme',
                'delete-profile-photo' => 'Profil fotoğrafı silme',
                'manage-social-links' => 'Sosyal medya bağlantılarını yönetme',
            ],

            // Güvenlik Yönetimi
            'security-management' => [
                'view-security-logs' => 'Güvenlik loglarını görüntüleme',
                'manage-2fa' => '2FA ayarlarını yönetme',
                'reset-user-2fa' => 'Kullanıcı 2FA sıfırlama',
                'view-login-history' => 'Giriş geçmişini görüntüleme',
                'manage-api-tokens' => 'API token yönetimi',
                'view-active-sessions' => 'Aktif oturumları görüntüleme',
                'force-logout-user' => 'Kullanıcıyı oturumdan çıkarma',
            ],

            // Rol Yönetimi
            'role-management' => [
                'list-roles' => 'Rolleri listeleme',
                'create-role' => 'Yeni rol oluşturma',
                'edit-role' => 'Rol düzenleme',
                'delete-role' => 'Rol silme',
                'assign-role' => 'Rol atama',
                'revoke-role' => 'Rol kaldırma',
                'view-role-permissions' => 'Rol izinlerini görüntüleme',
            ],

            // İzin Yönetimi
            'permission-management' => [
                'list-permissions' => 'İzinleri listeleme',
                'create-permission' => 'Yeni izin oluşturma',
                'edit-permission' => 'İzin düzenleme',
                'delete-permission' => 'İzin silme',
                'assign-permission' => 'İzin atama',
                'revoke-permission' => 'İzin kaldırma',
            ],

            // Film Yönetimi
            'movie-management' => [
                'list-movies' => 'Filmleri listeleme',
                'view-movie-details' => 'Film detaylarını görüntüleme',
                'create-movie' => 'Yeni film ekleme',
                'edit-movie' => 'Film düzenleme',
                'delete-movie' => 'Film silme',
                'restore-movie' => 'Silinmiş filmi geri getirme',
                'manage-movie-genres' => 'Film türlerini yönetme',
                'manage-movie-persons' => 'Film kişilerini yönetme',
                'upload-movie-media' => 'Film medyası yükleme',
            ],

            // Dizi Yönetimi
            'serie-management' => [
                'list-series' => 'Dizileri listeleme',
                'view-serie-details' => 'Dizi detaylarını görüntüleme',
                'create-serie' => 'Yeni dizi ekleme',
                'edit-serie' => 'Dizi düzenleme',
                'delete-serie' => 'Dizi silme',
                'restore-serie' => 'Silinmiş diziyi geri getirme',
                'manage-serie-genres' => 'Dizi türlerini yönetme',
                'manage-serie-persons' => 'Dizi kişilerini yönetme',
                'manage-serie-seasons' => 'Dizi sezonlarını yönetme',
                'upload-serie-media' => 'Dizi medyası yükleme',
            ],

            // Kişi Yönetimi
            'person-management' => [
                'list-persons' => 'Kişileri listeleme',
                'view-person-details' => 'Kişi detaylarını görüntüleme',
                'create-person' => 'Yeni kişi ekleme',
                'edit-person' => 'Kişi düzenleme',
                'delete-person' => 'Kişi silme',
                'restore-person' => 'Silinmiş kişiyi geri getirme',
                'manage-person-roles' => 'Kişi rollerini yönetme',
                'upload-person-photo' => 'Kişi fotoğrafı yükleme',
            ],

            // Tür Yönetimi
            'genre-management' => [
                'list-genres' => 'Türleri listeleme',
                'create-genre' => 'Yeni tür ekleme',
                'edit-genre' => 'Tür düzenleme',
                'delete-genre' => 'Tür silme',
                'restore-genre' => 'Silinmiş türü geri getirme',
            ],

            // Platform Yönetimi
            'platform-management' => [
                'list-platforms' => 'Platformları listeleme',
                'create-platform' => 'Yeni platform ekleme',
                'edit-platform' => 'Platform düzenleme',
                'delete-platform' => 'Platform silme',
                'restore-platform' => 'Silinmiş platformu geri getirme',
            ],

            // Dil Yönetimi
            'language-management' => [
                'list-languages' => 'Dilleri listeleme',
                'create-language' => 'Yeni dil ekleme',
                'edit-language' => 'Dil düzenleme',
                'delete-language' => 'Dil silme',
                'restore-language' => 'Silinmiş dili geri getirme',
            ],

            // Sistem Yönetimi
            'system-management' => [
                'view-dashboard' => 'Dashboard görüntüleme',
                'view-system-logs' => 'Sistem loglarını görüntüleme',
                'view-audit-logs' => 'Denetim loglarını görüntüleme',
                'view-error-logs' => 'Hata loglarını görüntüleme',
                'manage-system-settings' => 'Sistem ayarlarını yönetme',
                'manage-backups' => 'Yedekleme yönetimi',
                'view-system-health' => 'Sistem sağlığını görüntüleme',
                'clear-cache' => 'Önbellek temizleme',
                'run-maintenance' => 'Bakım modu yönetimi',
            ],

            // Medya Yönetimi
            'media-management' => [
                'upload-media' => 'Medya yükleme',
                'view-media' => 'Medya görüntüleme',
                'edit-media' => 'Medya düzenleme',
                'delete-media' => 'Medya silme',
                'manage-media-settings' => 'Medya ayarlarını yönetme',
            ],
        ];

        foreach ($permissionGroups as $group => $permissions) {
            foreach ($permissions as $name => $description) {
                Permission::create([
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'description' => $description,
                    'group' => $group,
                    'is_active' => true
                ]);
            }
        }
    }
}
