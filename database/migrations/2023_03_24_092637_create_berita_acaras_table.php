<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaAcarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita_acaras', function (Blueprint $table) {
            $table->id();
            $table->string('hari', 6);
            $table->date('tanggal');
            $table->dateTime('jam_masuk');
            $table->dateTime('jam_keluar');
            $table->text('pembahasan');
            $table->integer('jumlah_mhs')->length(2)->unsigned();
            $table->integer('kelas_id')->unsigned();
            $table->integer('matkul_id')->unsigned();
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
        Schema::dropIfExists('berita_acaras');
    }
}
