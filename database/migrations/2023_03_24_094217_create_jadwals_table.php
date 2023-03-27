<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->integer('kelas_id')->unsigned();
            $table->integer('matkul_id')->unsigned();
            $table->integer('dosen_id')->unsigned();
            $table->integer('ruang_id')->unsigned();
            $table->integer('semester')->length(2)->unsigned();
            $table->integer('jml_mhsw')->length(2)->unsigned();
            $table->integer('sks')->length(2)->unsigned();
            $table->text('teori');
            $table->integer('praktek')->length(2)->unsigned();
            $table->integer('jml_jam')->length(2)->unsigned();
            $table->integer('hr')->length(2)->unsigned();
            $table->string('hari', 6);
            $table->timestamp('jam_awal');
            $table->timestamp('jam_akhir');
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
        Schema::dropIfExists('jadwals');
    }
}
