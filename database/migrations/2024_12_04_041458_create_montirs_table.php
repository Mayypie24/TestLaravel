<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMontirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('montirs', function (Blueprint $table) {
            // Kolom id_montir sebagai primary key
            $table->bigIncrements('id_montir'); // id_montir sebagai primary key
            
            $table->string('nama_montir');
            $table->string('no_tlpon');
            $table->text('alamat_montir');
            $table->decimal('gajih', 15, 2); // Gaji dengan presisi dua angka desimal
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('montirs');
    }
}
