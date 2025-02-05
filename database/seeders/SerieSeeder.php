<?php

namespace Database\Seeders;

use App\Models\Serie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $series = [
            [
                "title" => "Squid Game",
                "description" => "Hundreds of cash-strapped players accept a strange invitation to compete in children's games. Inside, a tempting prize awaits with deadly high stakes: a survival game that has a whopping 45.6 billion-won prize at stake."
            ],
            [
                "title" => "La Casa De Papel",
                "description" => "An unusual group of robbers attempt to carry out the most perfect robbery in Spanish history - stealing 2.4 billion euros from the Royal Mint of Spain."
            ]
        ];

        foreach ($series as $serie) {
            Serie::create($serie);
        }
    }
}
