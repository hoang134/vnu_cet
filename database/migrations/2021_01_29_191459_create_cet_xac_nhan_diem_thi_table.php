<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCetXacNhanDiemThiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cet_xac_nhan_diem_thi', function (Blueprint $table) {
            $table->id();
            $table->string('tendangnhap');
            $table->string('lydo');
            $table->string('makythi');
            $table->string('noinhan');
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
        Schema::dropIfExists('cet_xac_nhan_diem_thi');
    }
}
