<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAllPaginated(array $filters, int $perPage = 15): LengthAwarePaginator
    {
        $query = $this->model->with(['profile', 'roles', 'status', 'preferences']);

        if (isset($filters['role'])) {
            $query->whereHas('roles', function ($q) use ($filters) {
                $q->where('name', $filters['role']);
            });
        }

        if (isset($filters['status'])) {
            $query->whereHas('status', function ($q) use ($filters) {
                $q->where('is_active', $filters['status'] === 'active');
            });
        }

        if (isset($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhereHas('profile', function ($q) use ($search) {
                        $q->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%");
                    });
            });
        }

        $sortField = $filters['sort_by'] ?? 'created_at';
        $sortDirection = $filters['sort_direction'] ?? 'desc';
        $query->orderBy($sortField, $sortDirection);

        return $query->paginate($perPage);
    }

    public function getAll(): Collection
    {
        return $this->model->with(['profile', 'roles', 'status', 'preferences'])->get();
    }

    public function getActive(): Collection
    {
        return $this->model->active()->with(['profile', 'roles', 'status', 'preferences'])->get();
    }

    public function getBanned(): Collection
    {
        return $this->model->banned()->with(['profile', 'roles', 'status', 'preferences'])->get();
    }

    public function findById(int $id): ?User
    {
        return $this->model->with(['profile', 'roles', 'status', 'preferences', 'socialLinks'])->find($id);
    }

    public function findByUsername(string $username): ?User
    {
        return $this->model->where('username', $username)->first();
    }

    public function findByEmail(string $email): ?User
    {
        return $this->model->where('email', $email)->first();
    }

    public function create(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $user = $this->model->create([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            if (isset($data['profile'])) {
                $user->profile()->create($data['profile']);
            }

            if (isset($data['security'])) {
                $user->security()->create($data['security']);
            }

            if (isset($data['status'])) {
                $user->status()->create($data['status']);
            }

            if (isset($data['preferences'])) {
                $user->preferences()->create($data['preferences']);
            }

            if (isset($data['roles'])) {
                $user->roles()->attach($data['roles']);
            }

            return $user->load(['profile', 'roles', 'status', 'preferences']);
        });
    }

    public function update(User $user, array $data): User
    {
        return DB::transaction(function () use ($user, $data) {
            $user->update([
                'username' => $data['username'] ?? $user->username,
                'email' => $data['email'] ?? $user->email,
            ]);

            if (isset($data['password'])) {
                $user->update(['password' => $data['password']]);
            }

            return $user->load(['profile', 'roles', 'status', 'preferences']);
        });
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }

    public function restore(int $id): bool
    {
        return $this->model->withTrashed()->findOrFail($id)->restore();
    }

    public function forceDelete(User $user): bool
    {
        return $user->forceDelete();
    }

    public function attachRole(User $user, int $roleId, array $attributes = []): void
    {
        $user->roles()->attach($roleId, $attributes);
    }

    public function detachRole(User $user, int $roleId): void
    {
        $user->roles()->detach($roleId);
    }

    public function syncRoles(User $user, array $roleIds): void
    {
        $user->roles()->sync($roleIds);
    }

    public function updateProfile(User $user, array $data): void
    {
        $user->profile()->update($data);
    }

    public function updateSecurity(User $user, array $data): void
    {
        $user->security()->update($data);
    }

    public function updateStatus(User $user, array $data): void
    {
        $user->status()->update($data);
    }

    public function updatePreferences(User $user, array $data): void
    {
        $user->preferences()->update($data);
    }

    public function addSocialLink(User $user, array $data): void
    {
        $user->socialLinks()->create($data);
    }

    public function updateSocialLink(User $user, int $linkId, array $data): void
    {
        $user->socialLinks()->where('id', $linkId)->update($data);
    }

    public function deleteSocialLink(User $user, int $linkId): void
    {
        $user->socialLinks()->where('id', $linkId)->delete();
    }

    public function search(string $term): Collection
    {
        return $this->model->where('username', 'like', "%{$term}%")
            ->orWhere('email', 'like', "%{$term}%")
            ->orWhereHas('profile', function ($query) use ($term) {
                $query->where('first_name', 'like', "%{$term}%")
                    ->orWhere('last_name', 'like', "%{$term}%");
            })
            ->get();
    }

    public function getByRole(string $role): Collection
    {
        return $this->model->whereHas('roles', function ($query) use ($role) {
            $query->where('slug', $role);
        })->get();
    }

    public function getWithPermission(string $permission): Collection
    {
        return $this->model->whereHas('roles.permissions', function ($query) use ($permission) {
            $query->where('slug', $permission);
        })->get();
    }
}
