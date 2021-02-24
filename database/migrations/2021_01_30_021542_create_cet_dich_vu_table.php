<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCetDichVuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cet_dich_vu', function (Blueprint $table) {
            $table->id();
            $table->string('tendangnhap');
            $table->string('tendichvu');
            $table->unsignedBigInteger('dichvu_id');
            $table->enum('trangthaithanhtoan',[\App\Models\CetDichVu::TTCHUATHANHTOAN,\App\Models\CetDichVu::TTDATHANHTOAN]);
            $table->enum('trangthaithuchien',[\App\Models\CetDichVu::TTCHUATHUCHIEN,\App\Models\CetDichVu::TTDATHUCHIEN]);
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
        Schema::dropIfExists('cet_dich_vu');
    }
}
