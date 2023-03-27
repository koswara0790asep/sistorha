<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->integer('matkul_id')->unsigned();
            // $table->foreign('matkul_id')->references('id')->on('matkuls');
            $table->integer('kelas_id')->unsigned();
            // $table->foreign('kelas_id')->references('id')->on('kelases');
            $table->string('semester', 2);
            $table->string('nim', 16);
            $table->string('pertemuan', 3);
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
        Schema::dropIfExists('absensis');
    }
}
