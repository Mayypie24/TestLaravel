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
        Schema::create('barang', function (Blueprint $table) {
            $table->id(); // Primary key otomatis
            $table->string('id_barang')->unique(); // ID Barang yang unik
            $table->string('nama_barang');
            $table->string('merk_barang');
            $table->integer('stok_barang');
            $table->decimal('harga_barang', 10, 2);
            $table->string('kualitas_barang');
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
