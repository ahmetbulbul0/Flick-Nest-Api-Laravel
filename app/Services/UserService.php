<?php

namespace App\Services;

use App\Models\User;
use App\Interfaces\Services\UserServiceInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers(array $filters)
    {
        return $this->userRepository->getAllPaginated($filters);
    }

    public function getActiveUsers()
    {
        return $this->userRepository->getActive();
    }

    public function getBannedUsers()
    {
        return $this->userRepository->getBanned();
    }

    public function getUserById(int $id)
    {
        return $this->userRepository->findById($id);
    }

    public function getUserByUsername(string $username)
    {
        return $this->userRepository->findByUsername($username);
    }

    public function getUserByEmail(string $email)
    {
        return $this->userRepository->findByEmail($email);
    }

    public function createUser(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function updateUser(int $id, array $data)
    {
        $user = $this->userRepository->findById($id);
        return $this->userRepository->update($user, $data);
    }

    public function deleteUser(int $id)
    {
        $user = $this->userRepository->findById($id);
        return $this->userRepository->delete($user);
    }

    public function restoreUser(int $id)
    {
        return $this->userRepository->restore($id);
    }

    public function forceDeleteUser(int $id)
    {
        $user = $this->userRepository->findById($id);
        return $this->userRepository->forceDelete($user);
    }

    public function assignRole(int $userId, int $roleId, array $attributes = [])
    {
        $user = $this->userRepository->findById($userId);
        $this->userRepository->attachRole($user, $roleId, $attributes);
    }

    public function removeRole(int $userId, int $roleId)
    {
        $user = $this->userRepository->findById($userId);
        $this->userRepository->detachRole($user, $roleId);
    }

    public function syncUserRoles(int $userId, array $roleIds)
    {
        $user = $this->userRepository->findById($userId);
        $this->userRepository->syncRoles($user, $roleIds);
    }

    public function updateUserProfile(int $userId, array $data)
    {
        $user = $this->userRepository->findById($userId);
        $this->userRepository->updateProfile($user, $data);
    }

    public function updateUserSecurity(int $userId, array $data)
    {
        $user = $this->userRepository->findById($userId);
        $this->userRepository->updateSecurity($user, $data);
    }

    public function updateUserStatus(int $userId, array $data)
    {
        $user = $this->userRepository->findById($userId);
        $this->userRepository->updateStatus($user, $data);
    }

    public function updateUserPreferences(int $userId, array $data)
    {
        $user = $this->userRepository->findById($userId);
        $this->userRepository->updatePreferences($user, $data);
    }

    public function addUserSocialLink(int $userId, array $data)
    {
        $user = $this->userRepository->findById($userId);
        $this->userRepository->addSocialLink($user, $data);
    }

    public function updateUserSocialLink(int $userId, int $linkId, array $data)
    {
        $user = $this->userRepository->findById($userId);
        $this->userRepository->updateSocialLink($user, $linkId, $data);
    }

    public function deleteUserSocialLink(int $userId, int $linkId)
    {
        $user = $this->userRepository->findById($userId);
        $this->userRepository->deleteSocialLink($user, $linkId);
    }

    public function searchUsers(string $term)
    {
        return $this->userRepository->search($term);
    }

    public function getUsersByRole(string $role)
    {
        return $this->userRepository->getByRole($role);
    }

    public function getUsersWithPermission(string $permission)
    {
        return $this->userRepository->getWithPermission($permission);
    }

    public function banUser(int $userId, string $reason)
    {
        $user = $this->userRepository->findById($userId);
        $this->userRepository->updateStatus($user, [
            'is_banned' => true,
            'banned_at' => now(),
            'ban_reason' => $reason
        ]);
    }

    public function unbanUser(int $userId)
    {
        $user = $this->userRepository->findById($userId);
        $this->userRepository->updateStatus($user, [
            'is_banned' => false,
            'banned_at' => null,
            'ban_reason' => null
        ]);
    }

    public function toggleUserStatus(int $userId)
    {
        $user = $this->userRepository->findById($userId);
        $this->userRepository->updateStatus($user, [
            'is_active' => !$user->status->is_active
        ]);
    }
}
