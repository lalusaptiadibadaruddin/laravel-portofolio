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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('restrict');
            $table->string('company');
            $table->string('position');
            $table->date('start_date'); // Tanggal mulai pekerjaan
            $table->date('end_date')->nullable(); // Tanggal selesai pekerjaan (nullable jika masih bekerja)
            $table->text('description')->nullable(); // Deskripsi pengalaman kerja
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
