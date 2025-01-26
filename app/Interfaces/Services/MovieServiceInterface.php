<?php

namespace App\Interfaces\Services;

interface MovieServiceInterface
{
    public function getAllMovies();
    public function getMovieById($id);
    public function createMovie(array $data);
    public function updateMovie($id, array $data);
    public function deleteMovie($id);
}
