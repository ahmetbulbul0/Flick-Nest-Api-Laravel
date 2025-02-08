<?php

namespace App\Interfaces\Services;

interface PersonServiceInterface
{
    public function getAllPersons();
    public function getPersonById($id);
    public function createPerson(array $data);
    public function updatePerson($id, array $data);
    public function deletePerson($id);
}
