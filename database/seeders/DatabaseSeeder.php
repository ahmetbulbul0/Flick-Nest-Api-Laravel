<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GenreSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(SerieSeeder::class);
        $this->call(SerieSeasonSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(PersonRoleSeeder::class);
        $this->call(PersonHasRoleSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
