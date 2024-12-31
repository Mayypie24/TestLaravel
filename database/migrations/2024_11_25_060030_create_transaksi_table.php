<?php

// app/database/migrations/xxxx_xx_xx_create_transaksi_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_transaksi');
            $table->decimal('harga_satuan', 10, 2);
            $table->integer('jumlah');
            $table->decimal('harga_total', 10, 2);
            $table->foreignId('id_barang')->nullable()->constrained('barang');
            $table->foreignId('id_layanan')->nullable()->constrained('layanan');
            $table->timestamp('tanggal_transaksi')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
