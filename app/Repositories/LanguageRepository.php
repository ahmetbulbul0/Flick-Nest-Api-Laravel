<?php

namespace App\Repositories;

use App\Models\Language;
use App\Interfaces\Repositories\LanguageRepositoryInterface;

class LanguageRepository implements LanguageRepositoryInterface
{
    public function getAll()
    {
        return Language::all();
    }
}
