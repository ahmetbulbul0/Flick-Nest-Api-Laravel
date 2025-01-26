<?php

namespace App\Repositories;

use App\Models\Serie;
use App\Interfaces\Repositories\SerieRepositoryInterface;

class SerieRepository implements SerieRepositoryInterface
{
    public function getAll()
    {
        return Serie::all();
    }

    public function findById($id)
    {
        return Serie::findOrFail($id);
    }

    public function create(array $data)
    {
        return Serie::create($data);
    }

    public function update($id, array $data)
    {
        $genre = Serie::findOrFail($id);
        $genre->update($data);

        return $genre;
    }

    public function delete($id)
    {
        $genre = Serie::findOrFail($id);
        $genre->delete();

        return true;
    }
}
