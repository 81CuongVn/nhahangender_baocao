<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanvien1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien1', function (Blueprint $table) {
            $table->bigIncrements('nv_id');
            $table->string('nv_hoten');
            $table->string('nv_sdt');
            $table->string('nv_diachi');
            $table->string('username');
            $table->string('password');

            $table->bigInteger('IdNhaHang')->unsigned();
            $table->bigInteger('IdCV')->unsigned();
            $table->rememberToken();
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
        Schema::dropIfExists('nhanvien1');
    }
}
