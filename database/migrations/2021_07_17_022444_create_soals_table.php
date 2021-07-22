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
            $table->integer('soal_mapel_id')->nullable()->default(0);
            $table->integer('soal_submapel_id')->nullable()->default(0);
            $table->text('soal_ujian');
            $table->text('soal_a');
            $table->text('soal_b');
            $table->text('soal_c');
            $table->text('soal_d');
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
        Schema::dropIfExists('tb_soal');
    }
}
