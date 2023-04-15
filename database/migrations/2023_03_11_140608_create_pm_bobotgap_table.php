<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmBobotGapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pm_bobotgap', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pmkriteria_id');
            $table->unsignedBigInteger('pmsubkriteria_id');
            $table->float('selisih');
            $table->float('bobot');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('pmkriteria_id')
                ->references('id')
                ->on('pm_kriteria')
                ->onDelete('cascade');

            $table->foreign('pmsubkriteria_id')
                ->references('id')
                ->on('pm_subkriteria')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pm_bobotgap');
    }
}
