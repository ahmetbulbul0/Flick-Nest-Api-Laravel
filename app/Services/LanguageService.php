<?php

namespace App\Services;

use App\Interfaces\Services\LanguageServiceInterface;
use App\Interfaces\Repositories\LanguageRepositoryInterface;

class LanguageService implements LanguageServiceInterface
{
    protected $languageRepository;

    public function __construct(LanguageRepositoryInterface $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function getAllLanguages()
    {
        return $this->languageRepository->getAll();
    }
}
