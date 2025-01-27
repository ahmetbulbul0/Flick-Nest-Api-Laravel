<?php

namespace App\Interfaces\Services;

interface SerieGenreServiceInterface
{
    public function createSerieGenre(array $data);
    public function deleteSerieGenre($id);
}
