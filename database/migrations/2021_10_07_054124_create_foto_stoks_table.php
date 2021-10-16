<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_stok', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_stok');
            $table->foreign('id_stok')->references('id')->on('stok')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('foto_stok');
    }
}
