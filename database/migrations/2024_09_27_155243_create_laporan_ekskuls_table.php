<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanEkskulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_ekskuls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('pembina_ekskul');
            $table->string('nama_ekskul');
            $table->integer('jml_kegiatan');
            $table->string('kegiatan_ekskul_m1')->nullable();
            $table->string('tgl_pelaksanaan_m1')->nullable();
            $table->string('tmp_pelaksanaan_m1')->nullable();
            $table->integer('jml_peserta_m1')->nullable();
            $table->string('foto_ekskul_m1')->nullable();
            $table->string('kegiatan_ekskul_m2')->nullable();
            $table->string('tgl_pelaksanaan_m2')->nullable();
            $table->string('tmp_pelaksanaan_m2')->nullable();
            $table->integer('jml_peserta_m2')->nullable();
            $table->string('foto_ekskul_m2')->nullable();
            $table->string('kegiatan_ekskul_m3')->nullable();
            $table->string('tgl_pelaksanaan_m3')->nullable();
            $table->string('tmp_pelaksanaan_m3')->nullable();
            $table->integer('jml_peserta_m3')->nullable();
            $table->string('foto_ekskul_m3')->nullable();
            $table->string('kegiatan_ekskul_m4')->nullable();
            $table->string('tgl_pelaksanaan_m4')->nullable();
            $table->string('tmp_pelaksanaan_m4')->nullable();
            $table->integer('jml_peserta_m4')->nullable();
            $table->string('foto_ekskul_m4')->nullable();
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
        Schema::dropIfExists('laporan_ekskuls');
    }
}
