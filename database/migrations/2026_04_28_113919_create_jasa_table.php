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
    Schema::create('jasa', function (Blueprint $table) {
        $table->id('id_jasa');
        $table->string('nama_jasa');
        $table->text('deskripsi');
        $table->foreignId('id_kategori')->constrained('kategori', 'id_kategori')->onDelete('cascade');
        $table->foreignId('id_pengguna')->constrained('pengguna', 'id_pengguna')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jasa');
    }
};
