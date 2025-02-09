<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Helpers\ResponseHelper;
use App\Http\Requests\Movie\StoreMovieRequest;
use App\Http\Requests\Movie\DeleteMovieRequest;
use App\Http\Requests\Movie\UpdateMovieRequest;
use App\Http\Resources\MovieResource;
use App\Interfaces\Services\MovieServiceInterface;

class MovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieServiceInterface $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index()
    {
        $movies = $this->movieService->getAllMovies();

        $movies = MovieResource::collection($movies);

        return ResponseHelper::success($movies);
    }

    public function store(StoreMovieRequest $request)
    {
        $createdMovie = $this->movieService->createMovie($request->validated());

        $createdMovie = new MovieResource($createdMovie);

        return ResponseHelper::success($createdMovie);
    }

    public function show($movieId)
    {
        $movie = $this->movieService->getMovieById($movieId);

        $movie = new MovieResource($movie);

        return ResponseHelper::success($movie);
    }

    public function update(UpdateMovieRequest $request, $movieId)
    {
        $update = $this->movieService->updateMovie($movieId, $request->validated());

        $update = new MovieResource($update);

        return ResponseHelper::success($update);
    }

    public function destroy(DeleteMovieRequest $request, $movieId)
    {
        $delete = $this->movieService->deleteMovie($movieId);

        return ResponseHelper::success($delete);
    }
}
