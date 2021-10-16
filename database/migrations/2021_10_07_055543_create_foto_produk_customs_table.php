<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoProdukCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_produk_custom', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produk_custom');
            $table->foreign('id_produk_custom')->references('id')->on('produk_custom')->onUpdate('cascade')->onDelete('cascade');
            $table->string('path');
            $table->boolean('foto_utama')->default(0);
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
        Schema::dropIfExists('foto_produk_custom');
    }
}
