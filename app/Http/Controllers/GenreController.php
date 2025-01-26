<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use app\Helpers\ResponseHelper;
use App\Http\Requests\Genre\StoreGenreRequest;
use App\Http\Requests\Genre\DeleteGenreRequest;
use App\Http\Requests\Genre\UpdateGenreRequest;
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

        return ResponseHelper::success($genres);
    }

    public function store(StoreGenreRequest $request)
    {
        $create = $this->genreService->createGenre($request->validated());

        return ResponseHelper::success($create);
    }
    public function show($genreId)
    {
        $genre = $this->genreService->getGenreById($genreId);

        return ResponseHelper::success($genre);
    }
    public function update(UpdateGenreRequest $request, $genreId)
    {
        $update = $this->genreService->updateGenre($genreId, $request->validated());

        return ResponseHelper::success($update);
    }
    public function destroy(DeleteGenreRequest $request, $genreId) {
        $delete = $this->genreService->deleteGenre($genreId);

        return ResponseHelper::success($delete);
    }
}
