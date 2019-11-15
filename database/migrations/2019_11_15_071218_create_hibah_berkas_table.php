<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHibahBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hibah_berkas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pengajuan_hibah_id')->unsigned()->index();
            $table->enum('jenis_dokumen_id', [0,1]);
            $table->string('hibah_dokumen_pengajuan');
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
        Schema::dropIfExists('hibah_berkas');
    }
}
