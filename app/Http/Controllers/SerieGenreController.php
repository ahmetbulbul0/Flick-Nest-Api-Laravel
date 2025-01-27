<?php

namespace App\Http\Controllers;

use app\Helpers\ResponseHelper;
use App\Http\Resources\SerieGenreResource;
use App\Interfaces\Services\SerieGenreServiceInterface;
use App\Http\Requests\SerieGenre\StoreSerieGenreRequest;
use App\Http\Requests\SerieGenre\DeleteSerieGenreRequest;

class SerieGenreController extends Controller
{
    protected $serieGenreService;

    public function __construct(SerieGenreServiceInterface $serieGenreService)
    {
        $this->serieGenreService = $serieGenreService;
    }

    public function store(StoreSerieGenreRequest $request)
    {
        $create = $this->serieGenreService->createSerieGenre($request->validated());

        $create = new SerieGenreResource($create);

        return ResponseHelper::success($create);
    }

    public function destroy(DeleteSerieGenreRequest $request, $serieGenreId)
    {
        $delete = $this->serieGenreService->deleteSerieGenre($serieGenreId);

        return ResponseHelper::success($delete);
    }
}
