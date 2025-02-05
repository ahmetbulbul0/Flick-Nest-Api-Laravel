<?php

namespace App\Interfaces\Services;

interface SerieSeasonServiceInterface
{
    public function getAllSerieSeasons();
    public function getSerieSeasonById($id);
    public function createSerieSeason(array $data);
    public function updateSerieSeason($id, array $data);
    public function deleteSerieSeason($id);
}
