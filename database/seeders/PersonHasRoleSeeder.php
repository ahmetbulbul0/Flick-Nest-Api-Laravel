<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\PersonHasRole;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $personIds = Person::pluck("id");

        foreach ($personIds as $personId) {
            PersonHasRole::create([
                "person_id" => $personId,
                "role_id" => 1, // Aktör
            ]);
        }
    }
}
