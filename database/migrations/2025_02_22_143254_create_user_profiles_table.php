<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Kişisel Bilgiler
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['male', 'female', 'other', 'prefer_not_to_say'])->default('prefer_not_to_say');
            $table->foreignId('nationality')->nullable()->constrained('countries')->onDelete('set null');
            $table->string('phone_number', 20)->nullable()->unique();

            // Profil Detayları
            $table->string('profile_photo')->nullable();
            $table->text('biography')->nullable();
            $table->json('additional_info')->nullable()->comment('Any additional profile information');

            // Her kullanıcının tek bir profili olabilir
            $table->unique('user_id');

            // Arama için index
            $table->index(['first_name', 'last_name']);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
