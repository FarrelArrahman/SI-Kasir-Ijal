<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStDetailTransaksiPengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('st_detail_transaksi_pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi');
            $table->foreign('id_transaksi')->references('id')->on('transaksi')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_barang')->constrained('barang');
            $table->integer('unit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('st_detail_transaksi_pengeluaran');
    }
}
