<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapBulananEkskulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_bulanan_ekskuls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bulan')->nullable();
            $table->string('sabtu_m1')->nullable();
            $table->string('minggu_m1')->nullable();
            $table->string('sabtu_m2')->nullable();
            $table->string('minggu_m2')->nullable();
            $table->string('sabtu_m3')->nullable();
            $table->string('minggu_m3')->nullable();
            $table->string('sabtu_m4')->nullable();
            $table->string('minggu_m4')->nullable();
            $table->string('sabtu_m5')->nullable();
            $table->string('minggu_m5')->nullable();
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
        Schema::dropIfExists('rekap_bulanan_ekskuls');
    }
}
