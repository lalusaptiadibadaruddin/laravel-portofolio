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
        Schema::create('list_skills', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('profile_id'); // Foreign key ke tabel users
            $table->unsignedBigInteger('skill_id'); // ID keterampilan
            $table->unique(['profile_id', 'skill_id']);
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('restrict');
            $table->foreign('skill_id')->references('id')->on('skill_types')->onDelete('restrict');
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_skills');
    }
};
