<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSawSubkriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saw_subkriteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sawkriteria_id');
            $table->string('nama_kriteria');
            $table->float('bobot');
            $table->enum('jenis_kriteria', ['Benefit', 'Cost']);
            $table->timestamps();

            $table->foreign('sawkriteria_id')
                ->references('id')
                ->on('saw_kriteria')
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
        Schema::dropIfExists('saw_subkriteria');
    }
}
