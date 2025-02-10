<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['name' => 'Türkçe', 'english_name' => 'Turkish', 'native_name' => 'Türkçe', 'code' => 'tr', 'direction' => 'ltr'],
            ['name' => 'İngilizce', 'english_name' => 'English', 'native_name' => 'English', 'code' => 'en', 'direction' => 'ltr'],
            ['name' => 'Çince', 'english_name' => 'Mandarin', 'native_name' => '中文 (Zhōngwén)', 'code' => 'zh', 'direction' => 'ltr'],
            ['name' => 'İspanyolca', 'english_name' => 'Spanish', 'native_name' => 'Español', 'code' => 'es', 'direction' => 'ltr'],
            ['name' => 'Hintçe', 'english_name' => 'Hindi', 'native_name' => 'हिन्दी (Hindī)', 'code' => 'hi', 'direction' => 'ltr'],
            ['name' => 'Arapça', 'english_name' => 'Arabic', 'native_name' => 'العربية (al-‘Arabīyah)', 'code' => 'ar', 'direction' => 'rtl'],
            ['name' => 'Portekizce', 'english_name' => 'Portuguese', 'native_name' => 'Português', 'code' => 'pt', 'direction' => 'ltr'],
            ['name' => 'Bengalce', 'english_name' => 'Bengali', 'native_name' => 'বাংলা (Bāṅlā)', 'code' => 'bn', 'direction' => 'ltr'],
            ['name' => 'Rusça', 'english_name' => 'Russian', 'native_name' => 'Русский (Russkiy)', 'code' => 'ru', 'direction' => 'ltr'],
            ['name' => 'Japonca', 'english_name' => 'Japanese', 'native_name' => '日本語 (Nihongo)', 'code' => 'ja', 'direction' => 'ltr'],
            ['name' => 'Almanca', 'english_name' => 'German', 'native_name' => 'Deutsch', 'code' => 'de', 'direction' => 'ltr'],
            ['name' => 'Fransızca', 'english_name' => 'French', 'native_name' => 'Français', 'code' => 'fr', 'direction' => 'ltr'],
            ['name' => 'Korece', 'english_name' => 'Korean', 'native_name' => '한국어 (Hangugeo)', 'code' => 'ko', 'direction' => 'ltr'],
            ['name' => 'İtalyanca', 'english_name' => 'Italian', 'native_name' => 'Italiano', 'code' => 'it', 'direction' => 'ltr'],
            ['name' => 'Tamilce', 'english_name' => 'Tamil', 'native_name' => 'தமிழ் (Tamiḻ)', 'code' => 'ta', 'direction' => 'ltr'],
            ['name' => 'Tayca', 'english_name' => 'Thai', 'native_name' => 'ไทย (Thai)', 'code' => 'th', 'direction' => 'ltr'],
            ['name' => 'Urduca', 'english_name' => 'Urdu', 'native_name' => 'اردو (Urdū)', 'code' => 'ur', 'direction' => 'rtl'],
            ['name' => 'Farsça', 'english_name' => 'Persian', 'native_name' => 'فارسی (Fārsī)', 'code' => 'fa', 'direction' => 'rtl'],
            ['name' => 'Gucaratça', 'english_name' => 'Gujarati', 'native_name' => 'ગુજરાતી (Gujarati)', 'code' => 'gu', 'direction' => 'ltr'],
            ['name' => 'Pencapça', 'english_name' => 'Punjabi', 'native_name' => 'ਪੰਜਾਬੀ (Pañjābī)', 'code' => 'pa', 'direction' => 'ltr'],
            ['name' => 'Lehçe', 'english_name' => 'Polish', 'native_name' => 'Polski', 'code' => 'pl', 'direction' => 'ltr'],
            ['name' => 'İbranice', 'english_name' => 'Hebrew', 'native_name' => 'עברית (Ivrit)', 'code' => 'he', 'direction' => 'rtl'],
            ['name' => 'Endonezce', 'english_name' => 'Indonesian', 'native_name' => 'Bahasa Indonesia', 'code' => 'id', 'direction' => 'ltr'],
            ['name' => 'İsveççe', 'english_name' => 'Swedish', 'native_name' => 'Svenska', 'code' => 'sv', 'direction' => 'ltr'],
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
