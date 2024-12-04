<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id('id_pelanggan');  // id_pelanggan sebagai primary key
            $table->string('nama_pelanggan');
            $table->string('no_tlpon');
            $table->text('alamat_pelanggan');
            $table->timestamps();  // Menambahkan created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('pelanggans');
    }
};
