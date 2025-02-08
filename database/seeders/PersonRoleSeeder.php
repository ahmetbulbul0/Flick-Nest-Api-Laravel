<?php

namespace Database\Seeders;

use App\Models\PersonRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["name" => "Aktör"],
            ["name" => "Yönetmen"],
            ["name" => "Yapımcı"],
        ];

        foreach ($data as $item) {
            PersonRole::create($item);
        }
    }
}
