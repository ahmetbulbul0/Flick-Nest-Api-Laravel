<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Interfaces\Repositories\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{
    public function getAll()
    {
        return Movie::all();
    }

    public function findById($id)
    {
        return Movie::findOrFail($id);
    }

    public function create(array $data)
    {
        return Movie::create($data);
    }

    public function update($id, array $data)
    {
        $genre = Movie::findOrFail($id);
        $genre->update($data);

        return $genre;
    }

    public function delete($id)
    {
        $genre = Movie::findOrFail($id);
        $genre->delete();

        return true;
    }
}
