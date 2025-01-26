<?php

namespace App\Http\Controllers;

use app\Helpers\ResponseHelper;
use App\Http\Resources\MovieGenreResource;
use App\Interfaces\Services\MovieGenreServiceInterface;
use App\Http\Requests\MovieGenre\StoreMovieGenreRequest;
use App\Http\Requests\MovieGenre\DeleteMovieGenreRequest;

class MovieGenreController extends Controller
{
    protected $movieGenreService;

    public function __construct(MovieGenreServiceInterface $movieGenreService)
    {
        $this->movieGenreService = $movieGenreService;
    }

    public function store(StoreMovieGenreRequest $request)
    {
        $create = $this->movieGenreService->createMovieGenre($request->validated());

        $create = new MovieGenreResource($create);

        return ResponseHelper::success($create);
    }

    public function destroy(DeleteMovieGenreRequest $request, $movieGenreId)
    {
        $delete = $this->movieGenreService->deleteMovieGenre($movieGenreId);

        return ResponseHelper::success($delete);
    }
}
