<?php

namespace App\Interfaces\Repositories;

interface SerieGenreRepositoryInterface
{
    public function create(array $data);
    public function delete($id);
}
