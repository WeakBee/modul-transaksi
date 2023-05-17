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
            $table->id();
            $table->timestamps();
            $table->string('id_transaksi');
            $table->string('nama_pembeli');
            $table->string('email_pembeli');
            $table->string('nama_barang');
            $table->decimal('harga_barang', 18, 4);
            $table->integer('jumlah_barang');
            $table->decimal('total_harga', 18, 4);
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
