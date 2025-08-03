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
       Schema::create('tugas', function (Blueprint $table) {
    $table->id('id_tugas');
    $table->unsignedBigInteger('id_materi'); // Foreign key ke materi
    $table->string('nama_tugas');
    $table->text('penjelasan');
    $table->date('deadline');
    $table->integer('nilai')->nullable();

    $table->foreign('id_materi')->references('id_materi')->on('materi')->onDelete('cascade');
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
