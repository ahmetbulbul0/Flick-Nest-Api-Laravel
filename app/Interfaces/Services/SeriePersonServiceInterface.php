<?php

namespace App\Interfaces\Services;

interface SeriePersonServiceInterface
{
    public function getAllSeriePersons();
    public function getSeriePersonById($id);
    public function createSeriePerson(array $data);
    public function updateSeriePerson($id, array $data);
    public function deleteSeriePerson($id);
}
