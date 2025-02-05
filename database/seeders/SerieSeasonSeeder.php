<?php

namespace Database\Seeders;

use App\Models\SerieSeason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SerieSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serieSeasons = [
            [
                "serie_id" => 1,
                "number" => 1,
                "title" => "Season 1",
                "episodes_count" => 9,
                "release_date" => "2021-09-17",
            ],
            [
                "serie_id" => 1,
                "number" => 2,
                "title" => "Season 2",
                "episodes_count" => 7,
                "release_date" => "2024-12-26",
            ],
        ];

        foreach ($serieSeasons as $serieSeason) {
            SerieSeason::create($serieSeason);
        }
    }
}
