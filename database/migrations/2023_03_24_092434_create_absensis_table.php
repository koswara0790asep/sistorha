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
            $table->enum('pertemuan1', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan2', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan3', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan4', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan5', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan6', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan7', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan8', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan9', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan10', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan11', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan12', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan13', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan14', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan15', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan16', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan17', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->enum('pertemuan18', ['Hadir', 'Alfa', 'Sakit', 'Izin'])->nullable();
            $table->time('telat1')->nullable();
            $table->time('telat2')->nullable();
            $table->time('telat3')->nullable();
            $table->time('telat4')->nullable();
            $table->time('telat5')->nullable();
            $table->time('telat6')->nullable();
            $table->time('telat7')->nullable();
            $table->time('telat8')->nullable();
            $table->time('telat9')->nullable();
            $table->time('telat10')->nullable();
            $table->time('telat11')->nullable();
            $table->time('telat12')->nullable();
            $table->time('telat13')->nullable();
            $table->time('telat14')->nullable();
            $table->time('telat15')->nullable();
            $table->time('telat16')->nullable();
            $table->time('telat17')->nullable();
            $table->time('telat18')->nullable();
            $table->string('keterangan', 50)->nullable();
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
