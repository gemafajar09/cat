<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_admin', function (Blueprint $table) {
            $table->bigIncrements('admin_id');
            $table->string('admin_nama')->nullable();
            $table->string('admin_username')->nullable();
            $table->string('admin_password')->nullable();
            $table->string('admin_notelp')->nullable();
            $table->text('admin_alamat')->nullable();
            $table->string('admin_level')->nullable();
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
        Schema::dropIfExists('tb_admin');
    }
}
