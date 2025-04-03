<?php

namespace App\Http\Controllers;

use app\Helpers\ResponseHelper;
use App\Http\Resources\RoleResource;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\DeleteRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Interfaces\Services\RoleServiceInterface;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleServiceInterface $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = $this->roleService->getAllRoles();

        $roles = RoleResource::collection($roles);

        return ResponseHelper::success($roles);
    }

    public function store(StoreRoleRequest $request)
    {
        $create = $this->roleService->createRole($request->validated());

        $create = new RoleResource($create);

        return ResponseHelper::success($create);
    }

    public function show($roleId)
    {
        $role = $this->roleService->getRoleById($roleId);

        $role = new RoleResource($role);

        return ResponseHelper::success($role);
    }

    public function update(UpdateRoleRequest $request, $roleId)
    {
        $update = $this->roleService->updateRole($roleId, $request->validated());

        $update = new RoleResource($update);

        return ResponseHelper::success($update);
    }

    public function destroy(DeleteRoleRequest $request, $roleId)
    {
        $delete = $this->roleService->deleteRole($roleId);

        return ResponseHelper::success($delete);
    }
}
