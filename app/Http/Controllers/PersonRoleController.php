<?php

namespace App\Http\Controllers;

use app\Helpers\ResponseHelper;
use App\Http\Resources\PersonRoleResource;
use App\Http\Requests\PersonRole\StorePersonRoleRequest;
use App\Http\Requests\PersonRole\DeletePersonRoleRequest;
use App\Http\Requests\PersonRole\UpdatePersonRoleRequest;
use App\Interfaces\Services\PersonRoleServiceInterface;

class PersonRoleController extends Controller
{
    protected $personRoleService;

    public function __construct(PersonRoleServiceInterface $personRoleService)
    {
        $this->personRoleService = $personRoleService;
    }

    public function index()
    {
        $personRoles = $this->personRoleService->getAllPersonRoles();

        $personRoles = PersonRoleResource::collection($personRoles);

        return ResponseHelper::success($personRoles);
    }

    public function store(StorePersonRoleRequest $request)
    {
        $create = $this->personRoleService->createPersonRole($request->validated());

        $create = new PersonRoleResource($create);

        return ResponseHelper::success($create);
    }

    public function show($personRoleId)
    {
        $personRole = $this->personRoleService->getPersonRoleById($personRoleId);

        $personRole = new PersonRoleResource($personRole);

        return ResponseHelper::success($personRole);
    }

    public function update(UpdatePersonRoleRequest $request, $personRoleId)
    {
        $update = $this->personRoleService->updatePersonRole($personRoleId, $request->validated());

        $update = new PersonRoleResource($update);

        return ResponseHelper::success($update);
    }

    public function destroy(DeletePersonRoleRequest $request, $personRoleId)
    {
        $delete = $this->personRoleService->deletePersonRole($personRoleId);

        return ResponseHelper::success($delete);
    }
}
