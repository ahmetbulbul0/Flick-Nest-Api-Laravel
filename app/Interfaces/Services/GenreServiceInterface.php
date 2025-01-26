<?php

namespace App\Interfaces\Services;

interface GenreServiceInterface
{
    public function getAllGenres();
    public function getGenreById($id);
    public function createGenre(array $data);
    public function updateGenre($id, array $data);
    public function deleteGenre($id);
}
