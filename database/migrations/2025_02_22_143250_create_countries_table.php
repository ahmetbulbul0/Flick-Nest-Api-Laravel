<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();

            // ISO Standart Kodları
            $table->char('iso_code_2', 2)->unique()->comment('ISO 3166-1 alpha-2');
            $table->char('iso_code_3', 3)->unique()->comment('ISO 3166-1 alpha-3');
            $table->char('iso_numeric', 3)->unique()->comment('ISO 3166-1 numeric');

            // Ülke Bilgileri
            $table->string('name')->unique()->comment('Ülkenin tam adı');
            $table->string('native_name')->nullable()->comment('Ülkenin yerel dildeki adı');
            $table->string('capital')->nullable()->comment('Başkent');
            $table->string('region')->nullable()->comment('Kıta/Bölge');
            $table->string('subregion')->nullable()->comment('Alt bölge');

            // Telefon ve Para Birimi
            $table->string('phone_code')->nullable()->comment('Telefon alan kodu');
            $table->string('currency_code')->nullable()->comment('Para birimi kodu');
            $table->string('currency_symbol')->nullable()->comment('Para birimi sembolü');

            // Bayrak ve Emoji
            $table->string('flag')->nullable()->comment('Bayrak dosya yolu');
            $table->string('flag_emoji')->nullable()->comment('Bayrak emoji');

            // Coğrafi Bilgiler
            $table->decimal('latitude', 10, 8)->nullable()->comment('Enlem');
            $table->decimal('longitude', 11, 8)->nullable()->comment('Boylam');
            $table->string('timezone')->nullable()->comment('Varsayılan saat dilimi');

            // Durum
            $table->boolean('is_active')->default(true)->comment('Aktiflik durumu');
            $table->integer('display_order')->default(0)->comment('Görüntüleme sırası');

            // İndeksler
            $table->index('is_active');
            $table->index('region');
            $table->index('display_order');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
