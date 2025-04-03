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
        $this->call([
            GenreSeeder::class,
            MovieSeeder::class,
            SerieSeeder::class,
            SerieSeasonSeeder::class,
            PersonSeeder::class,
            PersonRoleSeeder::class,
            PersonHasRoleSeeder::class,
            LanguageSeeder::class,
            PlatformSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            CountrySeeder::class,
            SuperAdminSeeder::class,
        ]);
    }
}
