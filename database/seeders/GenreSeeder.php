<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Aksiyon',
            'Macera',
            'Animasyon',
            'Biyografi',
            'Komedi',
            'Suç',
            'Belgesel',
            'Drama',
            'Aile',
            'Fantastik',
            'Kara Film',
            'Yarışma Programı',
            'Tarih',
            'Korku',
            'Müzik',
            'Müzikal',
            'Gizem',
            'Haber',
            'Romantik',
            'Bilim Kurgu',
            'Kısa Film',
            'Spor',
            'Söyleşi Programı',
            'Gerilim',
            'Savaş',
            'Western',
        ];

        foreach ($genres as $genre) {
            Genre::create([
                "name" => Str::lower($genre),
                "slug" => Str::slug($genre),
            ]);
        }
    }
}
