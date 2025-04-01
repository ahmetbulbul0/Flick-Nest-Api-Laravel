<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use app\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\Services\UserServiceInterface;
use App\Http\Requests\User\AddSocialLinkRequest;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['role', 'status', 'search', 'sort_by', 'sort_direction']);

        $users = $this->userService->getAllUsers($filters);

        $users = UserResource::collection($users);

        return ResponseHelper::success($users);
    }

    public function store(StoreUserRequest $request)
    {
        $user = $this->userService->createUser($request->validated());

        return ResponseHelper::success($user);
    }

    public function show(User $user)
    {
        $userData = $this->userService->getUserById($user->id);

        return ResponseHelper::success($userData);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $updatedUser = $this->userService->updateUser($user->id, $request->validated());

        return ResponseHelper::success($updatedUser);
    }

    public function destroy(User $user)
    {
        $this->userService->deleteUser($user->id);

        return ResponseHelper::success();
    }

    public function restore(int $id)
    {
        $this->userService->restoreUser($id);

        return ResponseHelper::success();
    }

    public function forceDelete(User $user)
    {
        $this->userService->forceDeleteUser($user->id);

        return ResponseHelper::success();
    }

    public function getActiveUsers()
    {
        $users = $this->userService->getActiveUsers();

        return ResponseHelper::success($users);
    }

    public function getBannedUsers()
    {
        $users = $this->userService->getBannedUsers();

        return ResponseHelper::success($users);
    }

    public function searchUsers(Request $request)
    {
        $users = $this->userService->searchUsers($request->get('term', ''));

        return ResponseHelper::success($users);
    }

    public function getUsersByRole(string $role)
    {
        $users = $this->userService->getUsersByRole($role);

        return ResponseHelper::success($users);
    }

    public function getUsersWithPermission(string $permission)
    {
        $users = $this->userService->getUsersWithPermission($permission);

        return ResponseHelper::success($users);
    }

    public function ban(Request $request, User $user)
    {
        $request->validate(['reason' => 'required|string|max:255']);
        $this->userService->banUser($user->id, $request->reason);

        return ResponseHelper::success();
    }

    public function unban(User $user)
    {
        $this->userService->unbanUser($user->id);

        return ResponseHelper::success();
    }

    public function toggleStatus(User $user)
    {
        $this->userService->toggleUserStatus($user->id);

        return ResponseHelper::success();
    }

    public function assignRole(User $user, Role $role, Request $request)
    {
        $attributes = $request->only(['expires_at', 'assigned_by']);
        $this->userService->assignRole($user->id, $role->id, $attributes);

        return ResponseHelper::success();
    }

    public function removeRole(User $user, Role $role)
    {
        $this->userService->removeRole($user->id, $role->id);

        return ResponseHelper::success();
    }

    public function syncRoles(Request $request, User $user)
    {
        $request->validate(['roles' => 'required|array', 'roles.*' => 'exists:roles,id']);

        $this->userService->syncUserRoles($user->id, $request->roles);

        return ResponseHelper::success();
    }

    public function updateProfile(Request $request, User $user)
    {
        $this->userService->updateUserProfile($user->id, $request->all());

        return ResponseHelper::success();
    }

    public function updateSecurity(Request $request, User $user)
    {
        $this->userService->updateUserSecurity($user->id, $request->all());

        return ResponseHelper::success();
    }

    public function updatePreferences(Request $request, User $user)
    {
        $this->userService->updateUserPreferences($user->id, $request->all());

        return ResponseHelper::success();
    }

    public function addSocialLink(AddSocialLinkRequest $request, User $user)
    {
        $this->userService->addUserSocialLink($user->id, $request->validated());

        return ResponseHelper::success();
    }

    public function updateSocialLink(Request $request, User $user, int $linkId)
    {
        $this->userService->updateUserSocialLink($user->id, $linkId, $request->all());

        return ResponseHelper::success();
    }

    public function deleteSocialLink(User $user, int $linkId)
    {
        $this->userService->deleteUserSocialLink($user->id, $linkId);

        return ResponseHelper::success();
    }
}
