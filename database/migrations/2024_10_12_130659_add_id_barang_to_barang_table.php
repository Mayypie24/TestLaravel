<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->string('id_barang')->nullable()->after('id'); // Tambahkan kolom id_barang sebagai nullable
        });
    }
    
    public function down()
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->dropColumn('id_barang'); // Hapus kolom id_barang saat rollback
        });
    }
    
};
