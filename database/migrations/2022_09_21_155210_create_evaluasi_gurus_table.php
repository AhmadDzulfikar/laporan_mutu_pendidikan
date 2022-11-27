<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluasiGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasi_gurus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('nama');
            $table->date('tanggal');
            $table->text('s1')->nullable();
            $table->text('s2')->nullable();
            $table->text('s3')->nullable();
            $table->longText('penghargaan')->nullable();
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
        Schema::dropIfExists('evaluasi_gurus');
    }
}
