<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('serie_persons', function (Blueprint $table) {
            $table->id();

            $table->foreignId('serie_id')->constrained('series')->onDelete('cascade');
            $table->foreignId('person_id')->constrained('persons')->onDelete('cascade');
            $table->foreignId('role_id')->constrained('person_roles')->onDelete('cascade');

            $table->unique(['serie_id', 'person_id', "role_id"]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serie_persons_');
    }
};
