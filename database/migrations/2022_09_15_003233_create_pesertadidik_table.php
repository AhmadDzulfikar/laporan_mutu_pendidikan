<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertadidikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertadidik', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('siswa');
            $table->integer('nisn');
            $table->string('tempat');
            $table->date('tgl_lahir');
            $table->bigInteger('no_tlp');
            $table->string('org_tua');
            $table->date('tgl_msk');
            $table->date('tgl_lulus');
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
        Schema::dropIfExists('pesertadidik');
    }
}
