<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('user_id');
            $table->text('judul_laporan');
            $table->text('isi_laporan');
            $table->string('foto');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori_laporan')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status_laporan')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
