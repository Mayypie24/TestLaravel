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
            $table->string('jenis_transaksi'); // 'barang' atau 'layanan'
            $table->foreignId('id_barang')->nullable()->constrained('barang');
            $table->foreignId('id_layanan')->nullable()->constrained('layanan');
            $table->decimal('harga_satuan', 15, 2);
            $table->integer('jumlah');
            $table->decimal('harga_total', 15, 2);
            $table->date('tanggal_transaksi');
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
