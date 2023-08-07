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
        Schema::create('period_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->enum('role', ['Admin', 'Admin Period', 'User']);
            $table->foreignUuid('period_id')->nullable();
            $table->foreignUuid('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('period_users');
    }
};
