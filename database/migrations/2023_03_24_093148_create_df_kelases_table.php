<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDfKelasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('df_kelases', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas', 20);
            $table->integer('dosen_id')->unsigned();
            $table->integer('prodi_id')->unsigned();
            $table->integer('periode')->unsigned();
            $table->string('kode');
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
        Schema::dropIfExists('df_kelases');
    }
}
