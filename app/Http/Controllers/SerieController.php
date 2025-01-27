<?php

namespace App\Http\Controllers;

use app\Helpers\ResponseHelper;
use App\Http\Resources\SerieResource;
use App\Http\Requests\Serie\StoreSerieRequest;
use App\Http\Requests\Serie\DeleteSerieRequest;
use App\Http\Requests\Serie\UpdateSerieRequest;
use App\Interfaces\Services\SerieServiceInterface;

class SerieController extends Controller
{
    protected $serieService;

    public function __construct(SerieServiceInterface $serieService)
    {
        $this->serieService = $serieService;
    }

    public function index()
    {
        $series = $this->serieService->getAllSeries();

        $series = SerieResource::collection($series);

        return ResponseHelper::success($series);
    }

    public function store(StoreSerieRequest $request)
    {
        $create = $this->serieService->createSerie($request->validated());

        $create = new SerieResource($create);

        return ResponseHelper::success($create);
    }

    public function show($serieId)
    {
        $serie = $this->serieService->getSerieById($serieId);

        $serie = new SerieResource($serie);

        return ResponseHelper::success($serie);
    }

    public function update(UpdateSerieRequest $request, $serieId)
    {
        $update = $this->serieService->updateSerie($serieId, $request->validated());

        $update = new SerieResource($update);

        return ResponseHelper::success($update);
    }

    public function destroy(DeleteSerieRequest $request, $serieId)
    {
        $delete = $this->serieService->deleteSerie($serieId);

        return ResponseHelper::success($delete);
    }
}
