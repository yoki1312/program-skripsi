<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('id_penjualan');
            $table->integer('id_status_penjualan');
            $table->integer('id_users');
            $table->char('catatan');
            $table->char('nama_users');
            $table->char('alamat_users');
            $table->integer('jumlah');
            $table->integer('total');
            $table->char('no_invoice');
            $table->date('tgl_penjualan');
            $table->char('qr');
            $table->char('jenis_customer');
            $table->integer('totalHarga');
            $table->integer('status_baca');
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
        Schema::dropIfExists('penjualan');
    }
}
