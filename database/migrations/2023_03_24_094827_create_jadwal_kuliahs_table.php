<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_kuliahs', function (Blueprint $table) {
            $table->id();
            $table->integer('kelas_id')->unsigned();
            $table->integer('matkul_id')->unsigned();
            $table->integer('dosen_id')->unsigned();
            $table->integer('ruang_id')->unsigned();
            $table->timestamp('jam_awal');
            $table->timestamp('jam_akhir');
            $table->string('hari', 6);
            $table->string('tahun_ajaran', 10);
            $table->integer('semester')->length(2)->unsigned();
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
        Schema::dropIfExists('jadwal_kuliahs');
    }
}
