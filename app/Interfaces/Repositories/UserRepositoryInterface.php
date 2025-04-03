<?php

namespace App\Interfaces\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function getAllPaginated(array $filters, int $perPage = 15): LengthAwarePaginator;
    public function getAll(): Collection;
    public function getActive(): Collection;
    public function getBanned(): Collection;
    public function findById(int $id): ?User;
    public function findByUsername(string $username): ?User;
    public function findByEmail(string $email): ?User;
    public function create(array $data): User;
    public function update(User $user, array $data): User;
    public function delete(User $user): bool;
    public function restore(int $id): bool;
    public function forceDelete(User $user): bool;
    public function attachRole(User $user, int $roleId, array $attributes = []): void;
    public function detachRole(User $user, int $roleId): void;
    public function syncRoles(User $user, array $roleIds): void;
    public function updateProfile(User $user, array $data): void;
    public function updateSecurity(User $user, array $data): void;
    public function updateStatus(User $user, array $data): void;
    public function updatePreferences(User $user, array $data): void;
    public function addSocialLink(User $user, array $data): void;
    public function updateSocialLink(User $user, int $linkId, array $data): void;
    public function deleteSocialLink(User $user, int $linkId): void;
    public function search(string $term): Collection;
    public function getByRole(string $role): Collection;
    public function getWithPermission(string $permission): Collection;
}
