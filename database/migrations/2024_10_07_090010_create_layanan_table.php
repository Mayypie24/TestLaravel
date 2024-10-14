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
        Schema::table('layanan', function (Blueprint $table) {
            $table->id();
            $table->integer('no')->nullable()->after('id'); // Menambahkan kolom No setelah kolom id    
            $table->string('nama_layanan');
            $table->text('deskripsi_layanan')->nullable();
            $table->integer('harga_layanan');
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
