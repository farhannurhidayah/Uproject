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
       Schema::create('materi', function (Blueprint $table) {
    $table->id('id_materi');
    $table->unsignedBigInteger('id_user'); // Foreign key ke user (guru)
    $table->string('nama_materi');
    $table->string('video')->nullable();
    $table->unsignedBigInteger('id_buku')->nullable(); // Relasi opsional ke buku

    $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
    $table->foreign('id_buku')->references('id_buku')->on('buku')->onDelete('set null');
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
