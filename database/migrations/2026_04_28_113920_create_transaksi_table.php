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
    Schema::create('transaksi', function (Blueprint $table) {
        $table->id('id_transaksi');
        $table->dateTime('tgl_transaksi');
        $table->foreignId('id_jasa')->constrained('jasa', 'id_jasa')->onDelete('cascade');
        $table->foreignId('id_penyedia_jasa')->constrained('pengguna', 'id_pengguna');
        $table->foreignId('id_penerima_jasa')->constrained('pengguna', 'id_pengguna');
        $table->integer('jumlah_poin'); 
        $table->enum('status', ['pending', 'proses', 'selesai', 'dibatalkan'])->default('pending');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
