<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalSkorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_skorsoal', function (Blueprint $table) {
            $table->id('skorsoal_id');
            $table->integer('skorsoal_soal_id');
            $table->integer('skorsoal_a');
            $table->integer('skorsoal_b');
            $table->integer('skorsoal_c');
            $table->integer('skorsoal_d');
            $table->integer('skorsoal_e');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_skorsoal');
    }
}
