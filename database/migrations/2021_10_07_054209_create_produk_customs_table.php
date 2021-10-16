<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_custom', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->unsignedBigInteger('id_type');
            $table->foreign('id_type')->references('id')->on('type');
            $table->string('keterangan')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('produk_custom');
    }
}
