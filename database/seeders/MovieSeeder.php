<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            'Focus',
            'Red Notice',
            'Instant Family',
            'Green Book',
            'Money Monster',
            'Split',
            'CM101MMXI Fundamentals',
            'Ölümlü Dünya',
            'Inside Out 2'
        ];

        foreach ($movies as $movie) {
            Movie::create([
                "title" => Str::lower($movie),
            ]);
        }
    }
}
