<?php

namespace App\Http\Controllers;

use app\Helpers\ResponseHelper;
use App\Http\Resources\PersonHasRoleResource;
use App\Interfaces\Services\PersonHasRoleServiceInterface;
use App\Http\Requests\PersonHasRole\StorePersonHasRoleRequest;
use App\Http\Requests\PersonHasRole\DeletePersonHasRoleRequest;

class PersonHasRoleController extends Controller
{
    protected $personHasRoleService;

    public function __construct(PersonHasRoleServiceInterface $personHasRoleService)
    {
        $this->personHasRoleService = $personHasRoleService;
    }

    public function store(StorePersonHasRoleRequest $request)
    {
        $create = $this->personHasRoleService->createPersonHasRole($request->validated());

        $create = new PersonHasRoleResource($create);

        return ResponseHelper::success($create);
    }

    public function destroy(DeletePersonHasRoleRequest $request, $personHasRoleId)
    {
        $delete = $this->personHasRoleService->deletePersonHasRole($personHasRoleId);

        return ResponseHelper::success($delete);
    }
}
