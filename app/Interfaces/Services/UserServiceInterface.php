<?php

namespace App\Interfaces\Services;

interface UserServiceInterface
{
    public function getAllUsers(array $filters);
    public function getActiveUsers();
    public function getBannedUsers();
    public function getUserById(int $id);
    public function getUserByUsername(string $username);
    public function getUserByEmail(string $email);
    public function createUser(array $data);
    public function updateUser(int $id, array $data);
    public function deleteUser(int $id);
    public function restoreUser(int $id);
    public function forceDeleteUser(int $id);
    public function assignRole(int $userId, int $roleId, array $attributes = []);
    public function removeRole(int $userId, int $roleId);
    public function syncUserRoles(int $userId, array $roleIds);
    public function updateUserProfile(int $userId, array $data);
    public function updateUserSecurity(int $userId, array $data);
    public function updateUserStatus(int $userId, array $data);
    public function updateUserPreferences(int $userId, array $data);
    public function addUserSocialLink(int $userId, array $data);
    public function updateUserSocialLink(int $userId, int $linkId, array $data);
    public function deleteUserSocialLink(int $userId, int $linkId);
    public function searchUsers(string $term);
    public function getUsersByRole(string $role);
    public function getUsersWithPermission(string $permission);
    public function banUser(int $userId, string $reason);
    public function unbanUser(int $userId);
    public function toggleUserStatus(int $userId);
}
