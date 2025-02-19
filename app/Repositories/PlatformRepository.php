<?php

namespace App\Repositories;

use App\Models\Platform;
use App\Interfaces\Repositories\PlatformRepositoryInterface;

class PlatformRepository implements PlatformRepositoryInterface
{
    public function getAll()
    {
        return Platform::all();
    }
}
