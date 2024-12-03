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
        // Membuat tabel `layanan` baru
        Schema::create('layanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_layanan');
            $table->text('deskripsi_layanan');
            $table->decimal('harga_layanan', 10, 2);
            $table->integer('durasi_layanan');
            $table->timestamps();
        });
        
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus tabel `layanan`
        Schema::dropIfExists('layanan');
    }
};
