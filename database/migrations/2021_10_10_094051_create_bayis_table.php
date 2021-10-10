<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_bayi');
            $table->string('nama_bayi');
            $table->string('alamat');
            $table->integer('umur_bayi');
            $table->string('nama_ibu');
            $table->integer('bb');
            $table->integer('panjang_bayi');
            $table->string('telp');
            $table->string('foto');
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
        Schema::dropIfExists('bayis');
    }
}
