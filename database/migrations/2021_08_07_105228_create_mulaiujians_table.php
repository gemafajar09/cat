<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMulaiujiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mulai_ujian', function (Blueprint $table) {
            $table->id('mulai_ujian_id');
            $table->integer('user_id');
            $table->date('mulai_ujian_tanggal');
            $table->time('mulai_ujian_start');
            $table->time('mulai_ujian_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_mulai_ujian');
    }
}
