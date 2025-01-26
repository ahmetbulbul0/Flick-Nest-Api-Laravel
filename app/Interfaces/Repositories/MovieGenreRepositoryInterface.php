<?php

namespace App\Interfaces\Repositories;

interface MovieGenreRepositoryInterface
{
    public function create(array $data);
    public function delete($id);
}
