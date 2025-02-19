<?php

namespace App\Services;

use App\Interfaces\Services\PlatformServiceInterface;
use App\Interfaces\Repositories\PlatformRepositoryInterface;

class PlatformService implements PlatformServiceInterface
{
    protected $platformRepository;

    public function __construct(PlatformRepositoryInterface $platformRepository)
    {
        $this->platformRepository = $platformRepository;
    }

    public function getAllPlatforms()
    {
        return $this->platformRepository->getAll();
    }
}
