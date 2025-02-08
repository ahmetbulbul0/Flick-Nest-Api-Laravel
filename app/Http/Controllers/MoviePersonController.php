<?php

namespace App\Http\Controllers;

use app\Helpers\ResponseHelper;
use App\Http\Resources\MoviePersonResource;
use App\Http\Requests\MoviePerson\StoreMoviePersonRequest;
use App\Http\Requests\MoviePerson\DeleteMoviePersonRequest;
use App\Http\Requests\MoviePerson\UpdateMoviePersonRequest;
use App\Interfaces\Services\MoviePersonServiceInterface;

class MoviePersonController extends Controller
{
    protected $moviePersonService;

    public function __construct(MoviePersonServiceInterface $moviePersonService)
    {
        $this->moviePersonService = $moviePersonService;
    }

    public function index()
    {
        $moviePersons = $this->moviePersonService->getAllMoviePersons();

        $moviePersons = MoviePersonResource::collection($moviePersons);

        return ResponseHelper::success($moviePersons);
    }

    public function store(StoreMoviePersonRequest $request)
    {
        $create = $this->moviePersonService->createMoviePerson($request->validated());

        $create = new MoviePersonResource($create);

        return ResponseHelper::success($create);
    }

    public function show($moviePersonId)
    {
        $serie = $this->moviePersonService->getMoviePersonById($moviePersonId);

        $serie = new MoviePersonResource($serie);

        return ResponseHelper::success($serie);
    }

    public function update(UpdateMoviePersonRequest $request, $moviePersonId)
    {
        $update = $this->moviePersonService->updateMoviePerson($moviePersonId, $request->validated());

        $update = new MoviePersonResource($update);

        return ResponseHelper::success($update);
    }

    public function destroy(DeleteMoviePersonRequest $request, $moviePersonId)
    {
        $delete = $this->moviePersonService->deleteMoviePerson($moviePersonId);

        return ResponseHelper::success($delete);
    }
}
