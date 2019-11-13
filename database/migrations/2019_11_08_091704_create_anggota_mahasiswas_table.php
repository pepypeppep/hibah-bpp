<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_mahasiswas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pengajuan_hibah_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->enum('ketua',[0,1])->default(0);
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
        Schema::dropIfExists('anggota_mahasiswas');
    }
}
