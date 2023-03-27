<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('nik', 16)->nullable();
            $table->string('nim', 10);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('agama', 10)->nullable();
            $table->string('no_hp', 14)->nullable();
            $table->string('email', 50)->nullable();
            $table->text('alamat')->nullable();
            $table->string('program_studi', 50);
            $table->string('periode', 4);
            $table->enum('status_aktif', ['Aktif', 'Tidak Aktif'])->default('Aktif');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
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
        Schema::dropIfExists('mahasiswas');
    }
}
