<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCetKythiStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cet_kythi_students', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('Makythi');
            $table->string('Mamonthi');
            $table->string('Sobaodanh');
            $table->string('Phongthi');
            $table->integer('Ketqua');
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
        Schema::dropIfExists('cet_kythi_students');
    }
}
