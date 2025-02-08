<?php

namespace App\Http\Controllers;

use app\Helpers\ResponseHelper;
use App\Http\Resources\SeriePersonResource;
use App\Http\Requests\SeriePerson\StoreSeriePersonRequest;
use App\Http\Requests\SeriePerson\DeleteSeriePersonRequest;
use App\Http\Requests\SeriePerson\UpdateSeriePersonRequest;
use App\Interfaces\Services\SeriePersonServiceInterface;

class SeriePersonController extends Controller
{
    protected $seriePersonService;

    public function __construct(SeriePersonServiceInterface $seriePersonService)
    {
        $this->seriePersonService = $seriePersonService;
    }

    public function index()
    {
        $seriePersons = $this->seriePersonService->getAllSeriePersons();

        $seriePersons = SeriePersonResource::collection($seriePersons);

        return ResponseHelper::success($seriePersons);
    }

    public function store(StoreSeriePersonRequest $request)
    {
        $create = $this->seriePersonService->createSeriePerson($request->validated());

        $create = new SeriePersonResource($create);

        return ResponseHelper::success($create);
    }

    public function show($seriePersonId)
    {
        $serie = $this->seriePersonService->getSeriePersonById($seriePersonId);

        $serie = new SeriePersonResource($serie);

        return ResponseHelper::success($serie);
    }

    public function update(UpdateSeriePersonRequest $request, $seriePersonId)
    {
        $update = $this->seriePersonService->updateSeriePerson($seriePersonId, $request->validated());

        $update = new SeriePersonResource($update);

        return ResponseHelper::success($update);
    }

    public function destroy(DeleteSeriePersonRequest $request, $seriePersonId)
    {
        $delete = $this->seriePersonService->deleteSeriePerson($seriePersonId);

        return ResponseHelper::success($delete);
    }
}
