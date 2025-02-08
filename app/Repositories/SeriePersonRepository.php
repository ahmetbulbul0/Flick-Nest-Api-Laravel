<?php

namespace App\Repositories;

use App\Models\SeriePerson;
use App\Interfaces\Repositories\SeriePersonRepositoryInterface;

class SeriePersonRepository implements SeriePersonRepositoryInterface
{
    public function getAll()
    {
        return SeriePerson::all();
    }

    public function findById($id)
    {
        return SeriePerson::findOrFail($id);
    }

    public function create(array $data)
    {
        return SeriePerson::create($data);
    }

    public function update($id, array $data)
    {
        $genre = SeriePerson::findOrFail($id);
        $genre->update($data);

        return $genre;
    }

    public function delete($id)
    {
        $genre = SeriePerson::findOrFail($id);
        $genre->delete();

        return true;
    }
}
