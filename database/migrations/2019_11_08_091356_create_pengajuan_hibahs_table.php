<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanHibahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_hibahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->bigInteger('hibah_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('judul');
            $table->string('abstrak')->nullable();
            $table->enum('hibah_status', [0, 1]);
            $table->enum('status_pengajuan', [0, 1, 2, 3, 4, 5]);
            $table->enum('status_terbit', [0, 1]);
            $table->enum('status_pencairan', [0, 1, 2, 3]);
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
        Schema::dropIfExists('pengajuan_hibahs');
    }
}
