<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('role_id')->constrained()->onDelete('cascade');

            $table->primary(['user_id', 'role_id']);

            $table->timestamp('assigned_at')->useCurrent();
            $table->string('assigned_by')->nullable()->comment('Username or system');
            $table->timestamp('expires_at')->nullable()->comment('Role expiration date if temporary');

            $table->index(['user_id', 'role_id', 'deleted_at']);
            $table->index('expires_at');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_role');
    }
};
