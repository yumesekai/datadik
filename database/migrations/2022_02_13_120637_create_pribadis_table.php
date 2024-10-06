<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePribadisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pribadis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('kelas_id');
            $table->enum('jk', ['L', 'P']);
            $table->string('nokk');
            $table->string('nik');
            $table->string('agama');
            $table->string('tmp_lahir');
            $table->string('tgl_lahir');
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
        Schema::dropIfExists('pribadis');
    }
}
