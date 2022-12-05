<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasiGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasi_gurus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            // $table->unsignedBigInteger('evaluasi_guru_id');
            // $table->foreign('evaluasi_guru_id')->references('id')->on('evaluasi_gurus');
            $table->foreignId('evaluasi_guru_id')->constrained('evaluasi_gurus')->onDelete('cascade');
            $table->longText('keterangan')->nullable();
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
        Schema::dropIfExists('prestasi_gurus');
    }
}
