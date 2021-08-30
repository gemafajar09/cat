<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_master_soal', function (Blueprint $table) {
            $table->id('soal_id');
            $table->integer('soal_kategori_id');
            $table->enum('soal_ujian_tipe', ['text', 'file']);
            $table->text('soal_ujian')->nullable();
            $table->enum('soal_pilihan_tipe', ['text', 'file']);
            $table->text('soal_a')->nullable();
            $table->text('soal_b')->nullable();
            $table->text('soal_c')->nullable();
            $table->text('soal_d')->nullable();
            $table->text('soal_e')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_master_soal');
    }
}
