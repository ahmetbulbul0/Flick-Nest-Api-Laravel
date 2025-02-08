<?php

namespace App\Interfaces\Services;

interface MoviePersonServiceInterface
{
    public function getAllMoviePersons();
    public function getMoviePersonById($id);
    public function createMoviePerson(array $data);
    public function updateMoviePerson($id, array $data);
    public function deleteMoviePerson($id);
}
