<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHibahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hibahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('slug');
            $table->string('hibah_judul');
            $table->bigInteger('hibah_kategori_id')->unsigned()->index();
            $table->dateTime('hibah_tgl_publish');
            $table->dateTime('hibah_tgl_mulai');
            $table->dateTime('hibah_tgl_selesai');
            $table->dateTime('hibah_tgl_mulai_laporankemajuan')->nullable();
            $table->dateTime('hibah_tgl_selesai_laporankemajuan')->nullable();
            $table->dateTime('hibah_tgl_mulai_laporanfinal')->nullable();
            $table->dateTime('hibah_tgl_selesai_laporanfinal')->nullable();
            $table->dateTime('hibah_tgl_pengumuman');
            $table->bigInteger('unit_id')->unsigned()->index();
            $table->string('hibah_panduan');
            $table->boolean('luaran')->default(0);
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
        Schema::dropIfExists('hibahs');
    }
}
