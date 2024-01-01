<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemPribadisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tem_pribadis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('pribadi_id');
            $table->string('nisn');
            $table->string('nama');
            $table->string('kelas');
            $table->enum('jk', ['L', 'P']);
            $table->string('nokk');
            $table->string('nik');
            $table->string('agama');
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->string('alamat')->nullable();
            $table->string('desa')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('tmp_tinggal')->nullable();
            $table->string('transport')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->string('no_tlp')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('beasiswa')->nullable();
            $table->string('status')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('berkas_beasiswa')->nullable();
            $table->string('berkas_kk')->nullable();
            $table->string('berkas_ijasah')->nullable();
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
        Schema::dropIfExists('tem_pribadis');
    }
}
