<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDfMatkulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('df_matkuls', function (Blueprint $table) {
            $table->id();
            $table->string('kode_matkul', 20);
            $table->string('nama_matkul', 50);
            $table->string('program_studi', 50);
            $table->integer('jenis_matkul')->length(2)->unsigned();
            $table->integer('bobot_matkul')->length(2)->unsigned();
            $table->integer('bobot_tatap_muka')->length(2)->unsigned();
            $table->integer('bobot_praktikum')->length(2)->unsigned();
            $table->integer('bobot_praktek_lapangan')->length(2)->unsigned();
            $table->integer('bobot_simulasi')->length(2)->unsigned();
            $table->string('metode_pembelajaran', 50);
            $table->date('tanggal_mulai_efektif');
            $table->date('tanggal_akhir_efektif');
            $table->integer('semester')->length(2)->unsigned();
            $table->string('dosen', 25);
            $table->integer('jam_pelajaran')->length(4)->unsigned();
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
        Schema::dropIfExists('df_matkuls');
    }
}
