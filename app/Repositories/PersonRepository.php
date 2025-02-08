<?php

namespace App\Repositories;

use App\Models\Person;
use App\Interfaces\Repositories\PersonRepositoryInterface;

class PersonRepository implements PersonRepositoryInterface
{
    public function getAll()
    {
        return Person::all();
    }

    public function findById($id)
    {
        return Person::findOrFail($id);
    }

    public function create(array $data)
    {
        return Person::create($data);
    }

    public function update($id, array $data)
    {
        $genre = Person::findOrFail($id);
        $genre->update($data);

        return $genre;
    }

    public function delete($id)
    {
        $genre = Person::findOrFail($id);
        $genre->delete();

        return true;
    }
}
