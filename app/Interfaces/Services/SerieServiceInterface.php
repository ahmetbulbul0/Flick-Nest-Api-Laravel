<?php

namespace App\Interfaces\Services;

interface SerieServiceInterface
{
    public function getAllSeries();
    public function getSerieById($id);
    public function createSerie(array $data);
    public function updateSerie($id, array $data);
    public function deleteSerie($id);
}
