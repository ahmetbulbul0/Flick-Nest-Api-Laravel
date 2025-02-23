<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_social_links', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('platform')->comment('facebook, twitter, instagram, linkedin etc.');
            $table->string('username')->comment('Platform specific username or profile ID');
            $table->string('url');
            $table->boolean('is_visible')->default(true);
            $table->integer('display_order')->default(0);

            $table->unique(['user_id', 'platform']);
            $table->index(['user_id', 'is_visible', 'display_order']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_social_links');
    }
};
