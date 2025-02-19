<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Netflix',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/0/08/Netflix_2015_logo.svg',
                'website' => 'https://www.netflix.com',
            ],
            [
                'name' => 'BluTV',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/3/3d/BluTV_logo.png',
                'website' => 'https://www.blutv.com',
            ],
            [
                'name' => 'Exxen',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/1/19/Exxen_logo.svg',
                'website' => 'https://www.exxen.com',
            ],
            [
                'name' => 'Amazon Prime Video',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/f/f1/Prime_Video.png',
                'website' => 'https://www.primevideo.com',
            ],
            [
                'name' => 'Disney+',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/3/3e/Disney%2B_logo.svg',
                'website' => 'https://www.disneyplus.com',
            ],
            [
                'name' => 'Apple TV+',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/7/7f/Apple_TV_Plus_Logo.svg',
                'website' => 'https://tv.apple.com',
            ],
            [
                'name' => 'beIN CONNECT',
                'logo' => 'https://www.beinconnect.com.tr/assets/img/brand/beinconnect.png',
                'website' => 'https://www.beinconnect.com.tr',
            ],
            [
                'name' => 'Gain',
                'logo' => 'https://www.gain.tv/assets/img/gain-logo.png',
                'website' => 'https://www.gain.tv',
            ],
            [
                'name' => 'PuhuTV',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/1/1e/PuhuTV_logo.svg',
                'website' => 'https://www.puhutv.com',
            ],
            [
                'name' => 'TV+',
                'logo' => 'https://www.turkcell.com.tr/uploads/images/tvplus.svg',
                'website' => 'https://www.tvplus.com.tr',
            ],
            [
                'name' => 'TOD',
                'logo' => 'https://www.todtv.com/assets/img/tod-logo.png',
                'website' => 'https://www.todtv.com.tr/',
            ],
            [
                'name' => 'YouTube Premium',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/5/5f/Youtube_premium_logo.png',
                'website' => 'https://www.youtube.com/premium',
            ],
        ];

        foreach ($data as $item) {
            Platform::create($item);
        }
    }
}
