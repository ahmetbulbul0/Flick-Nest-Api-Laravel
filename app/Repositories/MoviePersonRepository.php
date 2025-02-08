<?php

namespace App\Repositories;

use App\Models\MoviePerson;
use App\Interfaces\Repositories\MoviePersonRepositoryInterface;

class MoviePersonRepository implements MoviePersonRepositoryInterface
{
    public function getAll()
    {
        return MoviePerson::all();
    }

    public function findById($id)
    {
        return MoviePerson::findOrFail($id);
    }

    public function create(array $data)
    {
        return MoviePerson::create($data);
    }

    public function update($id, array $data)
    {
        $genre = MoviePerson::findOrFail($id);
        $genre->update($data);

        return $genre;
    }

    public function delete($id)
    {
        $genre = MoviePerson::findOrFail($id);
        $genre->delete();

        return true;
    }
}
