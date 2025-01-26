<?php

namespace App\Interfaces\Services;

interface MovieGenreServiceInterface
{
    public function createMovieGenre(array $data);
    public function deleteMovieGenre($id);
}
