<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankdata', function (Blueprint $table) {
            $table->increments('id_bankdata');
            $table->char('nama_tanaman');
            $table->char('nama_latin');
            $table->text('foto_sampul');
            $table->integer('id_kategori');
            $table->integer('id_jenisTanaman');
            $table->integer('hargaMax');
            $table->integer('hargaMin');
            $table->integer('idMediaTanam');
            $table->text('spesifikasi');
            $table->text('hastag');
            $table->char('caraPerawatan');
            $table->char('kebutuhanAir');
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
        Schema::dropIfExists('bankdata');
    }
}
