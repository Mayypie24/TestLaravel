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
            $table->string('jenis_transaksi');
            $table->date('tanggal_transaksi');
            $table->decimal('harga_total', 10, 2);
            $table->unsignedBigInteger('id_barang')->nullable();
            $table->unsignedBigInteger('id_layanan')->nullable();
            $table->integer('jumlah')->nullable();
            $table->timestamps();
        
            $table->foreign('id_barang')->references('id')->on('barang')->onDelete('cascade');
            $table->foreign('id_layanan')->references('id')->on('layanan')->onDelete('cascade');
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
