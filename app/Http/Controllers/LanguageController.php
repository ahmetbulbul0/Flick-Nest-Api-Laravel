<?php

namespace App\Http\Controllers;

use app\Helpers\ResponseHelper;
use App\Http\Resources\LanguageResource;
use App\Interfaces\Services\LanguageServiceInterface;

class LanguageController extends Controller
{
    protected $languageService;

    public function __construct(LanguageServiceInterface $languageService)
    {
        $this->languageService = $languageService;
    }

    public function index()
    {
        $languages = $this->languageService->getAllLanguages();

        $languages = LanguageResource::collection($languages);

        return ResponseHelper::success($languages);
    }
}
