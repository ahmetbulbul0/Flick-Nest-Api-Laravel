<?php

namespace App\Http\Controllers;

use app\Helpers\ResponseHelper;
use App\Http\Resources\PlatformResource;
use App\Interfaces\Services\PlatformServiceInterface;

class PlatformController extends Controller
{
    protected $platformService;

    public function __construct(PlatformServiceInterface $platformService)
    {
        $this->platformService = $platformService;
    }

    public function index()
    {
        $platforms = $this->platformService->getAllPlatforms();

        $platforms = PlatformResource::collection($platforms);

        return ResponseHelper::success($platforms);
    }
}
