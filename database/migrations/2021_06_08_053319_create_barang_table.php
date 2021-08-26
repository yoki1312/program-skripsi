<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->text('deskripsi');
            $table->char('kode');
            $table->char('nama_barang');
            $table->char('nama_latin');
            $table->integer('id_kategori');
            $table->char('berat');
            $table->integer('Created_by');
            $table->text('gambar_sampul');
            $table->integer('hargaAwal');
            $table->integer('hargaJual');
            $table->integer('diskon');
            $table->integer('panjang');
            $table->integer('lebar');
            $table->integer('tinggi');
            $table->integer('id_subKategori');
            $table->integer('id_induk');
            $table->integer('status');
            $table->integer('hargaReseler');
            $table->integer('hargaPersonal');
            $table->integer('id_bankdata');
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
        Schema::dropIfExists('barang');
    }
}
