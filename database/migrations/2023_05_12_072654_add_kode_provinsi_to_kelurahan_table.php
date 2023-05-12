<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKodeProvinsiToKelurahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kelurahan', function (Blueprint $table) {
            $table->string('kode_provinsi')->nullable();
            $table->foreign('kode_provinsi')->references('kode')->on('provinsi')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kelurahan', function (Blueprint $table) {
            $table->string('kode_provinsi')->nullable();
            $table->foreign('kode_provinsi')->references('kode')->on('provinsi')->onUpdate('cascade')->onDelete('cascade');
        });
    }
}
