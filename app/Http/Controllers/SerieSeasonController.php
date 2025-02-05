<?php

namespace App\Http\Controllers;

use app\Helpers\ResponseHelper;
use App\Http\Resources\SerieSeasonResource;
use App\Http\Requests\SerieSeason\StoreSerieSeasonRequest;
use App\Http\Requests\SerieSeason\DeleteSerieSeasonRequest;
use App\Http\Requests\SerieSeason\UpdateSerieSeasonRequest;
use App\Interfaces\Services\SerieSeasonServiceInterface;

class SerieSeasonController extends Controller
{
    protected $serieSeasonService;

    public function __construct(SerieSeasonServiceInterface $serieSeasonService)
    {
        $this->serieSeasonService = $serieSeasonService;
    }

    public function index()
    {
        $series = $this->serieSeasonService->getAllSerieSeasons();

        $series = SerieSeasonResource::collection($series);

        return ResponseHelper::success($series);
    }

    public function store(StoreSerieSeasonRequest $request)
    {
        $create = $this->serieSeasonService->createSerieSeason($request->validated());

        $create = new SerieSeasonResource($create);

        return ResponseHelper::success($create);
    }

    public function show($serieSeasonId)
    {
        $serie = $this->serieSeasonService->getSerieSeasonById($serieSeasonId);

        $serie = new SerieSeasonResource($serie);

        return ResponseHelper::success($serie);
    }

    public function update(UpdateSerieSeasonRequest $request, $serieSeasonId)
    {
        $update = $this->serieSeasonService->updateSerieSeason($serieSeasonId, $request->validated());

        $update = new SerieSeasonResource($update);

        return ResponseHelper::success($update);
    }

    public function destroy(DeleteSerieSeasonRequest $request, $serieSeasonId)
    {
        $delete = $this->serieSeasonService->deleteSerieSeason($serieSeasonId);

        return ResponseHelper::success($delete);
    }
}
