<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id(); // Kolom primary key
            $table->string('nama_pelanggan'); // Kolom nama pelanggan
            $table->string('email')->unique(); // Kolom email unik
            $table->string('telepon'); // Kolom telepon
            $table->text('alamat')->nullable(); // Kolom alamat (opsional)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
        
    }
    
    
    public function down()
    {
        Schema::dropIfExists('pelanggan');
    }
    
};
