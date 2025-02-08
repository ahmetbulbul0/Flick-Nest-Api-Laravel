<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "first_name" => "engin",
                "last_name" => "günaydın",
                "birth_date" => "1972-01-23",
            ],
            [
                "first_name" => "leyla lydia",
                "last_name" => "tuğutlu",
                "birth_date" => "1989-10-29",
            ],
            [
                "first_name" => "feyyaz",
                "last_name" => "yiğit",
                "birth_date" => "1988-07-01",
            ],
            [
                "first_name" => "kıvanç",
                "last_name" => "kılınç",
                "birth_date" => "1982-08-19",
            ],
            [
                "first_name" => "ahmet kürşat",
                "last_name" => "öçalan",
                "birth_date" => "1986-09-28",
            ],
        ];

        foreach ($data as $item) {
            Person::create($item);
        }
    }
}
