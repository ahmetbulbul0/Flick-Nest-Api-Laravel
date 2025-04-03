<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Hesap Durumu
            $table->boolean('is_active')->default(true);
            $table->boolean('is_banned')->default(false);
            $table->timestamp('banned_at')->nullable();
            $table->text('ban_reason')->nullable();
            $table->string('banned_by')->nullable();

            // Hesap Durumu Geçmişi
            $table->json('status_history')->nullable()->comment('History of status changes');

            // Her kullanıcının tek bir status kaydı olabilir
            $table->unique('user_id');

            // Performans için indexler
            $table->index('is_active');
            $table->index('is_banned');
            $table->index('banned_at');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_statuses');
    }
};
