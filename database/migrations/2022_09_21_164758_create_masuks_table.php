<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masuks', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('pesertadidik_id');
            // $table->foreign('pesertadidik_id')->references('id')->on('pesertadidik');
            $table->foreignId('pesertadidik_id')->constrained('pesertadidik')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('uangpangkal')->nullable();
            $table->integer('spp')->nullable();
            $table->integer('uangkegiatan')->nullable();
            $table->integer('uangperlengkapan')->nullable();
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
        Schema::dropIfExists('masuks');
    }
}
