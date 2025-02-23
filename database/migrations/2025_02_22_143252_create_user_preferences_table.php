<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_preferences', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('preferred_language_id')->nullable()->constrained('languages')->onDelete('set null');
            $table->enum('theme', ['light', 'dark', 'system'])->default('system');
            $table->json('notification_settings')->nullable()->comment('Email, push, SMS notification preferences');
            $table->json('privacy_settings')->nullable()->comment('Profile visibility, search visibility etc.');
            $table->json('accessibility_settings')->nullable()->comment('Font size, contrast etc.');
            $table->json('communication_preferences')->nullable()->comment('Newsletter, marketing emails etc.');

            $table->unique('user_id');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_preferences');
    }
};
 