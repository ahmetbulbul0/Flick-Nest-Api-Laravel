<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_securities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // İki Faktörlü Doğrulama
            $table->boolean('two_factor_enabled')->default(false);
            $table->string('two_factor_secret')->nullable();
            $table->json('two_factor_recovery_codes')->nullable();

            // Güvenlik Durumu
            $table->timestamp('email_verified_at')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip', 45)->nullable();
            $table->json('login_history')->nullable()->comment('Last 10 login attempts');

            // Her kullanıcının tek bir security kaydı olabilir
            $table->unique('user_id');

            // Performans için index
            $table->index('email_verified_at');
            $table->index('last_login_at');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_securities');
    }
};
