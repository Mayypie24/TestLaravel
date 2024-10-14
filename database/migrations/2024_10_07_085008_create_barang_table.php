<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->string('id_barang')->unique(); // Tambahkan kolom id_barang
            $table->string('nama_barang');
            $table->string('merk_barang');
            $table->integer('stok_barang');
            $table->decimal('harga_barang', 10, 2);
            $table->string('kualitas_barang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
