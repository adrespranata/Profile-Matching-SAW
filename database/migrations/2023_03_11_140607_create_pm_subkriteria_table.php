<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmSubKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pm_subkriteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pmkriteria_id');
            $table->string('nama_kriteria');
            $table->float('bobot');
            $table->enum('jenis_kriteria', ['Core Factor', 'Secondary Factor']);
            $table->timestamps();

            $table->foreign('pmkriteria_id')
                ->references('id')
                ->on('pm_kriteria')
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
        Schema::dropIfExists('pm_subkriteria');
    }
}
