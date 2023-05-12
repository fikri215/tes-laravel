<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pegawai');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->string('agama');
            $table->text('alamat');
            $table->string('kode_kelurahan');
            $table->string('kode_provinsi');
            $table->foreign('kode_kelurahan')->references('kode')->on('kelurahan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kode_provinsi')->references('kode')->on('provinsi')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('pegawai');
    }
}
