<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdBarangAndIdLayananToTransaksiTable extends Migration
{
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_barang')->nullable()->after('jenis_transaksi');
            $table->unsignedBigInteger('id_layanan')->nullable()->after('id_barang');

            // Tambahkan foreign key jika diperlukan
            $table->foreign('id_barang')->references('id')->on('barang')->onDelete('cascade');
            $table->foreign('id_layanan')->references('id')->on('layanan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropForeign(['id_barang']);
            $table->dropForeign(['id_layanan']);
            $table->dropColumn(['id_barang', 'id_layanan']);
        });
    }
}
