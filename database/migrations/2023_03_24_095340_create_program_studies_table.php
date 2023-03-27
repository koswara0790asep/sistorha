<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_studies', function (Blueprint $table) {
            $table->id();
            $table->string('program_studi', 50);
            $table->string('kode', 5);
            $table->enum('status', ['Aktif', 'Tidak Aktif'])->default('Aktif');
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
        Schema::dropIfExists('program_studies');
    }
}
