<?php

namespace App\Http\Controllers;

use app\Helpers\ResponseHelper;
use App\Http\Requests\Genre\StoreGenreRequest;
use App\Http\Requests\Genre\DeleteGenreRequest;
use App\Http\Requests\Genre\UpdateGenreRequest;
use App\Http\Resources\GenreResource;
use App\Interfaces\Services\GenreServiceInterface;

class GenreController extends Controller
{
    protected $genreService;

    public function __construct(GenreServiceInterface $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index()
    {
        $genres = $this->genreService->getAllGenres();

        $genres = GenreResource::collection($genres);

        return ResponseHelper::success($genres);
    }

    public function store(StoreGenreRequest $request)
    {
        $createdGenre = $this->genreService->createGenre($request->validated());

        $createdGenre = new GenreResource($createdGenre);

        return ResponseHelper::success($createdGenre);
    }

    public function show($genreId)
    {
        $genre = $this->genreService->getGenreById($genreId);

        $genre = new GenreResource($genre);

        return ResponseHelper::success($genre);
    }

    public function update(UpdateGenreRequest $request, $genreId)
    {
        $updatedGenre = $this->genreService->updateGenre($genreId, $request->validated());

        $updatedGenre = new GenreResource($updatedGenre);

        return ResponseHelper::success($updatedGenre);
    }

    public function destroy(DeleteGenreRequest $request, $genreId)
    {
        $delete = $this->genreService->deleteGenre($genreId);

        return ResponseHelper::success($delete);
    }
}
