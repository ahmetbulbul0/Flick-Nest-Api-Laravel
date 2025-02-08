<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Helpers\ResponseHelper;
use App\Http\Requests\Person\StorePersonRequest;
use App\Http\Requests\Person\DeletePersonRequest;
use App\Http\Requests\Person\UpdatePersonRequest;
use App\Http\Resources\PersonResource;
use App\Interfaces\Services\PersonServiceInterface;

class PersonController extends Controller
{
    protected $personService;

    public function __construct(PersonServiceInterface $personService)
    {
        $this->personService = $personService;
    }

    public function index()
    {
        $persons = $this->personService->getAllPersons();

        $persons = PersonResource::collection($persons);

        return ResponseHelper::success($persons);
    }

    public function store(StorePersonRequest $request)
    {
        $create = $this->personService->createPerson($request->validated());

        $create = new PersonResource($create);

        return ResponseHelper::success($create);
    }

    public function show($personId)
    {
        $person = $this->personService->getPersonById($personId);

        $person = new PersonResource($person);

        return ResponseHelper::success($person);
    }

    public function update(UpdatePersonRequest $request, $personId)
    {
        $update = $this->personService->updatePerson($personId, $request->validated());

        $update = new PersonResource($update);

        return ResponseHelper::success($update);
    }

    public function destroy(DeletePersonRequest $request, $personId)
    {
        $delete = $this->personService->deletePerson($personId);

        return ResponseHelper::success($delete);
    }
}
