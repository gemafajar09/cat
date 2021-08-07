<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMulaiujiandetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mulai_ujian_detail', function (Blueprint $table) {
            $table->id('mulai_ujian_detail_id');
            $table->integer('mulai_ujian_id');
            $table->integer('soal_id');
            $table->string('mulai_ujian_detail_jawaban');
            $table->string('mulai_ujian_detail_ragu_ragu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_mulai_ujian_detail');
    }
}
