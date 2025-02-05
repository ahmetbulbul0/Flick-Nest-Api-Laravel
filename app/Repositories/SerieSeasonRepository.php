<?php

namespace App\Repositories;

use App\Models\SerieSeason;
use App\Interfaces\Repositories\SerieSeasonRepositoryInterface;

class SerieSeasonRepository implements SerieSeasonRepositoryInterface
{
    public function getAll()
    {
        return SerieSeason::all();
    }

    public function findById($id)
    {
        return SerieSeason::findOrFail($id);
    }

    public function create(array $data)
    {
        return SerieSeason::create($data);
    }

    public function update($id, array $data)
    {
        $genre = SerieSeason::findOrFail($id);
        $genre->update($data);

        return $genre;
    }

    public function delete($id)
    {
        $genre = SerieSeason::findOrFail($id);
        $genre->delete();

        return true;
    }
}
